<?php
/**
 * Created by PhpStorm.
 * User: MansourPC
 * Date: 27/02/2018
 * Time: 14:07
 */

namespace AppBundle\Form;

use function Sodium\add;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $option)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('creationDate', DateType::class)
            ->add('releaseDate', DateType::class)
            ->add('durationTime', TextType::class)
            ->add('categories', EntityType::class, [
                'class'=>Category::class,
                'choice_label'=> 'name',
                'multiple'=>true,
            ])
            ->add('save', SubmitType::class, ['label' =>'Ajouter une Serie']);
    }
}