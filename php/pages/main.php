<div class="address_container container border">
    <div class="column mb-4 text-muted">
        <div class="col">
            <form id="address_form">
                <h2 class="form_title text-dark">Address Validator</h2>
                <h3 class="form_sub_title">Validate/Standardizes addresses using USPS</h3>
                <hr class="hr">

                <div class="form-outline mb-4">
                    <label class="form-label" for="addressLine1">Address Line 1</label>
                    <input type="text" id="addressLine1" class="form-control" required />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="addressLine2">Address Line 2</label>
                    <input type="text" id="addressLine2" class="form-control" required />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="city">City</label>
                    <input type="text" id="city" class="form-control" required />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="state">State</label>
                    <select type="text" id="state" class="form-control" required >
                        <option value="">Select state</option>
                        <? foreach ($states as $short => $state): ?>
                            <option value="<?= $short ?>"><?= $state ?></option>
                        <? endforeach; ?>
                    </select>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="zip">Zip code</label>
                    <input type="number" id="zip" class="form-control" required />
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Validate</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--This modal must go to separate file when the add_partial() functionality is ready for controllers rendering-->
<button type="button" id="modal_launcher" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="display: none">
    Launch demo modal
</button>
<div class="modal fade text-muted" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-dark" id="exampleModalLabel">Save Address</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Which address format do you want to save?</h5>

                <nav class="nav nav-pills nav-fill">
                    <a id="original_nav" class="nav-item nav-link active" href="#">ORIGINAL</a>
                    <a id="standardized_nav" class="nav-item nav-link" href="#">STANDARDIZED (USPS)</a>
                </nav>


                <div id="original_area" class="area border border-secondary active">
                    <p>Address Line 1: <span id="original_addressLine1"></span></p>
                    <p>Address Line 2: <span id="original_addressLine2"></span></p>
                    <p>City: <span id="original_city"></span></p>
                    <p>State: <span id="original_state"></span></p>
                    <p>zip: <span id="original_zip"></span></p>
                </div>

                <div id="standardized_area" class="area border border-secondary ">
                    <p>Address Line 1: <span id="standardized_addressLine1"></span></p>
                    <p>Address Line 2: <span id="standardized_addressLine2"></span></p>
                    <p>City: <span id="standardized_city"></span></p>
                    <p>State: <span id="standardized_state"></span></p>
                    <p>zip: <span id="standardized_zip"></span></p>
                </div>

                <div id="success_alert" class="alert alert-success" role="alert" style="display: none">
                    Address saved successfully!
                </div>
            </div>
            <div class="modal-footer">
                <button id="submit_address" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>






