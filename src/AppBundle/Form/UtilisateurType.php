<?php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom',      'text')
        ->add('prenom',     'text')
        ->add('email',    'text')
        ->add('pseudo',   'text')
        ->add('password', 'password') 
        ->add('photo', 'file')
        //->add('vote', new VoteType())
        ->add('inscrire',      'submit')
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Utilisateur'
        ));
    }
    
    public function getName()
    {
        return 'appbundle_utilisateur';
    }
}

?>