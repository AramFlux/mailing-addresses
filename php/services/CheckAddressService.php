<?php

/**
 * Todo: expand service and load them with ServiceFactory, all services must implement from Service interface
 *
 * Class CheckAddressService
 */
class CheckAddressService
{

    /**
     * @param array $data
     * @return array
     * @throws InvalidDataException
     */
    public function checkAddress(array $data): array
    {
        $this->validate($data);

        $address1 = $data['addressLine1'];
        $address2 = $data['addressLine2'];
        $city = $data['city'];
        $state = $data['state'];
        $zip = $data['zip'];

        $user_id = USPS_USER_ID;

        $request_doc_template = <<<EOT
<?xml version="1.0"?>
<AddressValidateRequest USERID="$user_id">
    <Revision>1</Revision>
    <Address ID="0">
        <Address1>$address1</Address1>
        <Address2>$address2</Address2>
        <City>$city</City>
        <State>$state</State>
        <Zip5>$zip</Zip5>
        <Zip4></Zip4>
    </Address>
</AddressValidateRequest>
EOT;

        $doc_string = preg_replace('/[\t\n]/', '', $request_doc_template);
        $doc_string = urlencode($doc_string);

        $url = "http://production.shippingapis.com/ShippingAPI.dll?API=Verify&XML=" . $doc_string;

        $response = file_get_contents($url);

        $xml = simplexml_load_string($response);

        if (
            empty($xml->Address->Address1)
            || empty($xml->Address->Address2)
            || empty($xml->Address->City)
            || empty($xml->Address->State)
            || empty($xml->Address->Zip5)
        ) {
            throw new InvalidDataException('The address is invalid');
        }

        return [
            'address1' => $xml->Address->Address1,
            'address2' => $xml->Address->Address2,
            'city' => $xml->Address->City,
            'state' => $xml->Address->State,
            'zip' => $xml->Address->Zip5,
        ];
    }

    /**
     * @param array $data
     * @throws InvalidDataException
     */
    public function validate(array $data): void
    {
        // Todo: Using validator tools are better
        // Todo: validate types too

        if (empty($data['addressLine1'])) {
            throw new InvalidDataException('No addressLine1 provided');
        }

        if (empty($data['addressLine2'])) {
            throw new InvalidDataException('No addressLine2 provided');
        }

        if (empty($data['city'])) {
            throw new InvalidDataException('No city provided');
        }

        if (empty($data['state'])) {
            throw new InvalidDataException('No state provided');
        }

        if (empty($data['zip'])) {
            throw new InvalidDataException('No zip provided');
        }
    }

    /**
     * Saves the address into database
     *
     * @param array $data
     */
    public function saveAddress(array $data)
    {
        AddressModel::create()->addAddress($data);
    }

}