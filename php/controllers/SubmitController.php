<?php

/**
 * Class SubmitController
 */
class SubmitController extends BaseController
{
    /**
     * controller entrypoint for url '/submit'
     */
    public function submit()
    {
        $checkAddressService = new CheckAddressService();

        try {
            $checkAddressService->checkAddress($_POST);
            $checkAddressService->saveAddress($_POST);
        } catch (InvalidDataException $e) {
            $this->send_api_error(['message' => $e->getMessage()]);
        } catch (Throwable $e) {
            // Todo: log exception for further investigation
            $this->send_api_error(['message' => $e->getMessage()]);
        }

        $this->send_api_success();
    }
}