<?php

namespace AppBundle\Form;

//use Doctrine\ORM\EntityManagerInterface;
use Money\Money;
use Money\Currency;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Exception;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Price form type
 *
 * @package AppBundle\Form
 */
class PriceType extends AbstractType implements DataMapperInterface
{
    /**
     * Money currencies
     *
     * @var array
     */
    private $currencies;

    /**
     * PriceType constructor.
     * @param array $currencies
     */
    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }

    /**
     * Building form
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price_amount', NumberType::class)
            ->add(
                'price_currency',
                ChoiceType::class,
                array(
                    // set keys the same as values
                    'choices' => array_combine($this->currencies, $this->currencies)
                )
            )
            ->setDataMapper($this);
    }

    /**
     * Options configuration
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => null,
                'empty_data' => null
            )
        );
    }

    /**
     * Return form name
     *
     * @return string
     */
    public function getName()
    {
        return 'price_type';
    }

    /**
     * Mapping value object to form values
     *
     * @param mixed                                                $data
     * @param \Symfony\Component\Form\FormInterface[]|\Traversable $forms
     */
    public function mapDataToForms($data, $forms)
    {
        $forms = iterator_to_array($forms);
        /* @var $data Money */

        $forms['price_amount']->setData($data ? $data->getAmount() : 0);
        $forms['price_currency']->setData($data ? $data->getCurrency()->getCode() : 'PLN');
    }

    /**
     * Mapping form values to value object
     *
     * @param \Symfony\Component\Form\FormInterface[]|\Traversable $forms
     * @param mixed                                                $data
     */
    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);
        $data = new Money(
            $forms['price_amount']->getData(),
            new Currency($forms['price_currency']->getData())
        );
    }
}
