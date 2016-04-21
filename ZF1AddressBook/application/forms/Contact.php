<?php

class Application_Form_Contact extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $element = new Zend_Form_Element_Text('prenom');
        $element->setLabel('Prénom');
        $element->setRequired();
        
        $validator = new Zend_Validate_NotEmpty();
        $validator->setMessage('Le prénom est obligatoire', Zend_Validate_NotEmpty::IS_EMPTY);
        $element->addValidator($validator);
        
        $validator = new Zend_Validate_StringLength();
        $validator->setMessage('Le prénom ne doit pas dépasser %max% caractères', Zend_Validate_StringLength::TOO_LONG);
        $validator->setMax(40);
        $element->addValidator($validator);
        
        $filter = new Zend_Filter_StringTrim();
        $element->addFilter($filter);
        
        $filter = new Zend_Filter_StripTags();
        $element->addFilter($filter);
        
        $this->addElement($element);
        
        
        $element = new Zend_Form_Element_Text('nom');
        $element->setLabel('Nom');
        
        $this->addElement($element);
        
        
        $element = new Zend_Form_Element_Text('email');
        $element->setLabel('Email');
        
        $this->addElement($element);
        
        
        $element = new Zend_Form_Element_Text('telephone');
        $element->setLabel('Téléphone');
        
        $this->addElement($element);
        
        // Exercices :
        // Ajouter les validateurs et filtres 
        // - required (sur le nom)
        // - stringlength sur tous les champs
        // - trim et striptags sur tous les champs
        // - Email : vérifier le format et qu'il ne soit pas en base
        // doc de Zend_Validate_NoRecordExists
    }


}

