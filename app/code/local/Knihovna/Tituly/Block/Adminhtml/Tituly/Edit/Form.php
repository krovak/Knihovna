<?php

class Knihovna_Tituly_Block_Adminhtml_Tituly_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    public function _construct()
    {
        parent::_construct();
        $this->setId('editForm');
        $this->setTitle('Přidat záznam');
    }

    public function _prepareForm()
    {

        $autor = Mage::registry('tituly');
        $form  = new Varien_Data_Form(array(
            'id'     => 'edit_form',
            'method' => 'post'
        ));
        $f     = $form->addFieldset('tituly', array(
            'legend' => 'Přidat knihu',
            'class'  => 'fieldset-short'
        ));

        $this->default_cover = Mage::getBaseUrl('skin').'/frontend/base/default/images/cover'; //defaultní obal knihy

        $adr = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . "media/cover/" . $autor->getIsbn() . ".png";
        $adr_rel = "cover". DS . $autor->getIsbn() . ".png";
        $file = new Varien_Io_File();

        if($file->fileExists(Mage::getBaseDir('media').DS.$adr_rel))
        {
            $obr = '<img style="display: block; height: inherit" id="obrazek" src ="' .$adr . '">';
        }
        else
        {
            $adr = $this->default_cover. "/neexistuje.png";
            $obr = '<img style="display: block; height: inherit" id="obrazek" src ="' .$adr . '">';
        }

        $f->addField('note', 'note', array(
            'text'     => "<span style='display: block; position: absolute; right: 2%; margin-top: -0.5%; height: 16em'>" . $obr . "</span>"
        ));

        $isbnf = $f->addField('isbn', 'text', array(
            'name'  => 'isbn',
            'label' => 'ISBN',
            'style' => 'width:45%',
            'tabindex' => 1
        ));
        if ($autor->getId()) {
            $f->addField('entity_id', 'hidden', array(
                'name' => 'entity_id'
            ));
        }
        $f->addField('autor', 'hidden', array(
                'name'     => 'autor',
                'label'    => 'Autor',
                //'required' => true,
                //'values'   => Mage::getModel('autor/source_autori')->toOptionArray()
            )
        );
        $f->addField('fullname', 'text', array(
                'name'  => 'fullname',
                'label'    => 'Autor',
                'index' => "fullname",
                'required' => true,
                //'values'   => Mage::getModel('autor/source_autori')->toOptionArray()
            )
        );
        $f->addField('nazev', 'text', array(
            'name'     => 'nazev',
            'label'    => 'Název',
            'required' => true
        ));

        $f->addField('pocet_stranek', 'text', array(
            'name'  => 'pocet_stranek',
            'label' => 'Počet stránek',
            'width' => '100px'
        ));

        $f->addField('rok_vydani', 'text', array(
            'name'     => 'rok_vydani',
            'label'    => 'Rok vydání',
            'width'    => '100px',
            'required' => true
        ));
        $f->addField('zanr', 'select', array(
                'name'     => 'zanr',
                'label'    => 'Žánr',
                'required' => true,
                'values'   => Mage::getModel('tituly/source_zanr')->toOptionArray()
            )
        );





        //$adr = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . "media/cover/" . $autor->getIsbn() . ".png";
        //echo "<img id='obrazek' src=\"$adr\">";

        $urlImp = $this->getUrl('*/*/import'); //url s metodou v contoleru, kterou chci zavolat

        //přidání tlačítka se scriptem na stahování informací
        //tlačítko se přidá za element $isbnf (edit isbn)
        //tlačítko po stisku zavolá $urlImp a načte z ní json objekt, který následně přiřadí jednotlivým vstupům
        $isbnf->setAfterElementHtml("
        <button onclick='getGoogleBook();return false;'>Načíst z GoogleBooks</button>

        <script>
        //nastavení kurzoru do pole isbn
        $('isbn').focus();
        //----------------------------------
        function getGoogleBook(){
            if (validaceISBN($('isbn').value))
            {
                $('isbn').setStyle({borderColor: ''});
                var urlImp = '$urlImp';
                new Ajax.Request(urlImp,{
                        method:'get',
                        parameters:'q='+$('isbn').value,
                onComplete: function(transport) {
                  var odpoved=JSON.parse(transport.responseText);
                  var imagecover = new Element('img',{src:odpoved.obrazek,style:'float:right',id:'obrazek'});
                  if (odpoved.nazev!=false){
                    $('nazev').value = odpoved.nazev;
                    $('rok_vydani').value = odpoved.rokVydani;
                    $('autor').value = odpoved.autor;
                    $('fullname').value = odpoved.autor_text;
                    $('pocet_stranek').value = parseInt(odpoved.format[0]);
                    if ($('obrazek')==undefined)
                    {
                        $('tituly').insert({top :imagecover});
                        $('tituly').insert({bottom :new Element('div',{ style:'clear:both'})});
                        $('obrazek').next().setStyle({'float':'right',
                        width: '50%'});
                    }
                    else
                    {
                        $('obrazek').update($('obrazek').src = imagecover.src);
                    }
                    }
                    else {
                    $('isbn') . setStyle({borderColor: 'red'});
                    $('isbn').value = 'ISBN nenalezeno';
    }
                }
                });
            }
            else
            {
                $('isbn').setStyle({borderColor: 'red'});
                $('isbn').value = 'Neplatný formát ISBN';
            }
         }
         function validaceISBN (isbn)
         {
            isbn = isbn.replace(/[^\dX]/gi, '');
            if(isbn.length != 10)
            {
                if (checkEan(isbn))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                var chars = isbn.split('');
                if(chars[9].toUpperCase() == 'X')
                {
                    chars[9] = 10;
                }
                var sum = 0;
                for (var i = 0; i < chars.length; i++)
                {
                    sum += ((10-i) * parseInt(chars[i]));
                };
                return ((sum % 11) == 0);
            }
         }

         function checkEan(eanCode)
         {
            // Check if only digits
            var ValidChars = '0123456789';
            for (i = 0; i < eanCode.length; i++) {
                digit = eanCode.charAt(i);
                if (ValidChars.indexOf(digit) == -1) {
                    return false;
                }
            }

            // Add five 0 if the code has only 8 digits
            if (eanCode.length == 8 ) {
                eanCode = '00000' + eanCode;
            }
            // Check for 13 digits otherwise
            else if (eanCode.length != 13) {
                return false;
            }

            // Get the check number
            originalCheck = eanCode.substring(eanCode.length - 1);
            eanCode = eanCode.substring(0, eanCode.length - 1);

            // Add even numbers together
            even = Number(eanCode.charAt(1)) +
                   Number(eanCode.charAt(3)) +
                   Number(eanCode.charAt(5)) +
                   Number(eanCode.charAt(7)) +
                   Number(eanCode.charAt(9)) +
                   Number(eanCode.charAt(11));
            // Multiply this result by 3
            even *= 3;

            // Add odd numbers together
            odd = Number(eanCode.charAt(0)) +
                  Number(eanCode.charAt(2)) +
                  Number(eanCode.charAt(4)) +
                  Number(eanCode.charAt(6)) +
                  Number(eanCode.charAt(8)) +
                  Number(eanCode.charAt(10));

            // Add two totals together
            total = even + odd;

            // Calculate the checksum
            // Divide total by 10 and store the remainder
            checksum = total % 10;
            // If result is not 0 then take away 10
            if (checksum != 0) {
                checksum = 10 - checksum;
            }

            // Return the result
            if (checksum != originalCheck) {
                return false;
            }

            return true;
         }
        </script>");
        $form->setValues($autor->getData());


        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();
    }

}
