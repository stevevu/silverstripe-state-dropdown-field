<?php

namespace Dynamic\StateDropdownField\Tests;

use Dynamic\StateDropdownField\Fields\StateDropdownField;
use SilverStripe\Dev\SapphireTest;

/**
 * Class StateDropdownTest
 */
class StateDropdownTest extends SapphireTest
{

    /**
     * Test the fields default state source is populated on a generic call
     */
    public function testDefaultStates()
    {
        $default = [
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
            '-' => '-----',
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

        $dropdown = StateDropdownField::create('TestField', 'Test Field');
        $this->assertEquals($default, $dropdown->getSource());
    }

    /**
     * Test passing states to the constructor properly sets the state source
     */
    public function testConstructStates()
    {
        $states = [
            'WI' => 'Wisconsin',
            'MN' => 'Minnesota',
        ];

        $dropdown = StateDropdownField::create('TestField', 'Test Field', $states);
        $this->assertEquals($states, $dropdown->getSource());
    }

    public function testSingleDimensionSource()
    {
        $statesSource = [
            'WI',
            'MN',
        ];

        $statesExpected = [
            'WI' => 'WI',
            'MN' => 'MN',
        ];

        $dropdown = StateDropdownField::create('TestField', 'Test Field', $statesSource);
        $this->assertEquals($statesExpected, $dropdown->getSource());

    }

    public function testNonArraySource()
    {
        $this->markTestIncomplete('Write test to confirm proper error triggers when non-array passed as source');
    }

    /**
     * Test that disabled items are set properly as well as merged with the default separator if present
     */
    public function testSetDisabledItems()
    {
        $expectedDisabled = [
            '-',
            'WI',
        ];

        $disabledKeys = [
            'WI',
        ];

        $dropdown = StateDropdownField::create('TestField', 'Test Field');
        $dropdown->setDisabledItems($disabledKeys);

        $this->assertEquals($expectedDisabled, $dropdown->getDisabledItems());

        $dropdown2 = StateDropdownField::create('TestField2', 'Test Field 2');
        $this->assertEquals(['-'], $dropdown2->getDisabledItems());
    }

}