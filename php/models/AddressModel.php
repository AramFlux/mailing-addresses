<?php

/**
 * Class AddressModel
 */
class AddressModel extends BaseModel
{
    /**
     * Adds address to database table
     *
     * @param array $data
     * @throws Exception
     */
    public function addAddress(array $data): void
    {
        $statement = self::$connection->prepare("INSERT INTO addresses (address1, address2, city, state, zip)
            VALUES (?, ?, ?, ?, ?)");
        $statement->bind_param('sssss', $addressLine1, $addressLine2, $city, $state, $zip);

        $addressLine1 = $data['addressLine1'];
        $addressLine2 = $data['addressLine2'];
        $city = $data['city'];
        $state = $data['state'];
        $zip = $data['zip'];

        if ($statement->execute() !== true) {
            // Todo: implement error handling, separate error types
            throw new Exception('Failed to insert data');
        }
    }
}