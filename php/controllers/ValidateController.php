<?php

/**
 * Class ValidateController
 */
class ValidateController extends BaseController
{
    /**
     * controller entrypoint for url '/validate'
     */
    public function index()
    {
        $checkAddressService = new CheckAddressService();

        try {
            $correctAddress = $checkAddressService->checkAddress($_POST);
        } catch (InvalidDataException $e) {
            $this->send_api_error(['message' => $e->getMessage()]);
        } catch (Exception $e) {
            // Todo: log exception for further investigation
            $this->send_api_error(['message' => $e->getMessage()]);
        }

        $this->send_api_success($correctAddress);
    }
}