<!-- linking the css file -->
<div class="snow_container"></div>
<link rel="stylesheet" href="<?= base_url('assets/css/signup.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.css'); ?>">

<div class="body_container">


    <div class="form-container">
        <div class="bg">
            <div class="s-head">
                Signup
            </div>
            <div class="s-desc">
                Signup
            </div>
            <form>

                <div class="row">
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="firstName" placeholder="First Name">
                    </div>
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <input type="text" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="input-group mb-3 col">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">+63</span>
                        </div>
                        <input id="number" placeholder="Mobile Number" type="number" class="number form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Address">
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <input type="password" class="form-control" id="firstName" placeholder="Password">
                    </div>
                    <div class="mb-3 col">
                        <input type="password" class="form-control" id="lastName" placeholder="Confirm Password">
                    </div>
                </div>
        </div>


        <div class="row buttons">
            <div class="col-md">
                <button type="cancel" class="form-button btn btn-danger">Back</button>
            </div>
            <div class="col-md">
            </div>
            <div class="col-md">
                <button type="submit" class="form-button btn btn-success">Submit</button>
            </div>

        </div>
        </form>
    </div>


</div>