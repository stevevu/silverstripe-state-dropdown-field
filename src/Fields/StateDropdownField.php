<?php

namespace Dynamic\StateDropdownField\Fields;

use SilverStripe\Forms\DropdownField;

/**
 * A simple extension to dropdown field, pre-configured to list states.
 *
 * Class StateDropdownField
 * @package Dynamic\StateDropdownField\Fields
 */
class StateDropdownField extends DropdownField
{
    /**
     * @var array
     */
    private static $default_states = [
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District Of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
    ];

    /**
     * @var array
     */
    private static $default_provinces = [
        'AB' => 'Alberta',
        'BC' => 'British Columbia',
        'MB' => 'Manitoba',
        'NB' => 'New Brunswick',
        'NL' => 'Newfoundland and Labrador',
        'NS' => 'Nova Scotia',
        'ON' => 'Ontario',
        'PE' => 'Prince Edward Island',
        'QC' => 'Quebec',
        'SK' => 'Saskatchewan',
    ];

    /**
     * @var bool
     */
    private static $include_state_province_separator = true;

    /**
     * @var string
     */
    private static $option_separator_value = '-';

    /**
     * @var string
     */
    private static $option_separator = '-----';

    /**
     * @var array
     */
    protected $states;

    /**
     * @var array
     */
    protected $disabled_options;

    /**
     * @var array
     */
    protected $extraClasses = array('dropdown');

    /**
     * StateDropdownField constructor.
     * @param string $name
     * @param null $title
     * @param null|array $source
     * @param string $value
     * @param null $form
     */
    public function __construct($name, $title = null, $source = [], $value = '', $form = null)
    {

        if (!empty($source)) {
            $this->setStates($source);
        }

        $this->setDisabledItems();

        parent::__construct($name, ($title === null) ? $name : $title, $source, $value, $form);
    }

    /**
     * @param array $states
     * @param bool $includeProvinces
     * @return $this
     */
    public function setStates($states = [], $includeProvinces = true)
    {
        if ($states !== (array)$states) {
            trigger_error(
                "The \$source passed isn't an array. When passing a source it must be an array.",
                E_USER_ERROR
            );
        }

        $globalDefaults = empty($states);

        if ($globalDefaults) {
            $states = $this->getDefaultStatesList();
        }

        if ($globalDefaults && $includeProvinces) {
            $states = array_merge($states, $this->getDefaultProvincesList());
        }

        reset($states);
        if ((int)key($states) === key($states)) {
            foreach ($states as $state) {
                $updatedSource[$state] = $state;
            }
        }

        $this->states = isset($updatedSource) ? $updatedSource : $states;

        return $this;
    }

    /**
     * @return array
     */
    protected function getDefaultStatesList()
    {
        return $this->config()->get('default_states');
    }

    /**
     * @return array
     */
    protected function getDefaultProvincesList()
    {
        $provinces = ((bool)$this->config()->get('include_state_province_separator'))
            ? [
                (string)$this->config()->get('option_separator_value') => (string)$this->config()->get(
                    'option_separator'
                ),
            ]
            : [];
        $provinces = array_merge($provinces, $this->config()->get('default_provinces'));

        return $provinces;
    }

    /**
     * @return array
     */
    public function getStates()
    {
        if (!$this->states || empty($this->states)) {
            $this->setStates();
        }

        return $this->states;
    }

    /**
     * @param array $source
     * @return $this
     */
    public function setSource($source = [])
    {
        $this->setStates($source);

        return $this;
    }

    /**
     * @return array
     */
    public function getSource()
    {
        return $this->getStates();
    }

    /**
     * Prepend disabled array with separator value
     *
     * @param array $disabled
     * @return DropdownField
     */
    public function setDisabledItems($disabled = [])
    {
        if (!in_array($this->config()->get('option_separator_value'), $disabled)) {
            array_unshift($disabled, $this->config()->get('option_separator_value'));
        }

        return parent::setDisabledItems($disabled);
    }
}
