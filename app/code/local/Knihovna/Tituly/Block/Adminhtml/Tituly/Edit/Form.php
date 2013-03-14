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
        $f->addField('autor', 'select', array(
                'name'     => 'autor',
                'label'    => 'Autor',
                'required' => true,
                'values'   => Mage::getModel('autor/source_autori')->toOptionArray()
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

        $urlImp = $this->getUrl('*/*/import'); //url s metodou v contoleru, kterou chci zavolat

        //přidání tlačítka se scriptem na stahování informací
        //tlačítko se přidá za element $isbnf (edit isbn)
        //tlačítko po stisku zavolá $urlImp a načte z ní json objekt, který následně přiřadí jednotlivým vstupům
        $isbnf->setAfterElementHtml("
        <button onclick='getGoogleBook();return false;'>Načíst z GoogleBooks</button>

        <script>
        //nastavení kurzoru do pole isbn
            var ctrl = document.getElementById('isbn');
            if (ctrl != null && ctrl.value == '')
             {
        ctrl.focus();
             }
        //----------------------------------
        function getGoogleBook(){
            if (validaceISBN(document.getElementById('isbn').value))
            {
                var urlImp = '$urlImp';
                new Ajax.Request(urlImp,{
                        method:'get',
                        parameters:'q='+$('isbn').value,
                onComplete: function(transport) {
                  var odpoved=JSON.parse(transport.responseText);
                    $('nazev').value = odpoved.nazev;
                    $('rok_vydani').value = odpoved.rokVydani;
                    $('pocet_stranek').value = parseInt(odpoved.format[0]);
                    $('tituly').insert({top:new Element('img',{src:odpoved.obrazek,style:'float:right'})});
                }
                });
            }

         }
         function validaceISBN (isbn)
         {
            isbn = isbn.replace(/[^\dX]/gi, '');
            if(isbn.length != 10)
            {
                return false;
            }
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
        </script>");

        $form->setValues($autor->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
/*<script type="text/javascript" language="javascript">//
function SetFocus() {
    var ctrl = document.getElementById("Text1");
    if (ctrl != null && ctrl.value == '') {
        ctrl.focus();
    }
}
</script>*/
