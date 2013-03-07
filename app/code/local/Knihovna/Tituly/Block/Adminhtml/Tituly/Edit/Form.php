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
            'style' => 'width:45%'
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
        $isbnf->setAfterElementHtml("
        <button onclick='getGoogleBook();return false;'>Načíst z GoogleBooks</button>
        <script>
            function listEntries(booksInfo)
            {
                var kniha = booksInfo;
                alert(booksInfo.prewiev);

            }
            function search(query)
            {
                var sc = document.createElement('script');
                sc.setAttribute('id', 'jsonScript');
                sc.setAttribute('src', 'http://books.google.com/books?bibkeys=' +
                    escape(query.isbns.value) + '&jscmd=viewapi&callback=listEntries');
                sc.setAttribute('type', 'text/javascript');
                document.documentElement.firstChild.appendChild(sc);
            }
        </script>");

        $form->setValues($autor->getData());
        $form->setUseContainer(true);
        $form->setAction($this->getUrl('*/*/save'));
        $this->setForm($form);
        return parent::_prepareForm();
    }
}