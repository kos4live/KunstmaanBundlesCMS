<?php

namespace Kunstmaan\FormBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * This class represents the type for the file FileFormSubmissionField
 */
class FileFormSubmissionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder The form builder
     * @param array                $options An array with options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $keys = array_fill_keys(array('label', 'required', 'constraints'), null);
        $fieldOptions = array_filter(array_replace($keys, array_intersect_key($options, $keys)), function($v) { return isset($v); });

        $builder->add('file', 'file', $fieldOptions);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kunstmaan\FormBundle\Entity\FormSubmissionFieldTypes\FileFormSubmissionField',
        ));
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'kunstmaan_formbundle_fileformsubmissiontype';
    }
}
