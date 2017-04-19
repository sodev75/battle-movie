<?php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class VoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       /* $builder
        ->add('id_saga', ChoiceType::class, array(
    'choices'  => array(
        '1' => 'Star wars',
        '2' => 'Star trek',
        '3' => 'Star trek',
        
    )));
    
   /* ->add('periode', ChoiceType::class, array(
        'choices'  => array(
            '1' => '1970',
            '2' => '1980',
            '3' => '1990',
            '4' => '2000',
            '5' => '2010',
        )));*/
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Vote'
        ));
    }
    
    public function getName()
    {
        return 'appbundle_vote';
    }
}

?>