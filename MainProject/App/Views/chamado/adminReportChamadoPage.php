<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Validation</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item active">Validation</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Browser Default</h5>
          <p>Browser default validation with using the <code>required</code> keyword. Try submitting the form below. Depending on your browser and OS, you’ll see a slightly different style of feedback.</p>

          <!-- Browser Default Validation -->
          <form class="row g-3">
            <div class="col-md-4">
              <label for="validationDefault01" class="form-label">First name</label>
              <input type="text" class="form-control" id="validationDefault01" value="John" required>
            </div>
            <div class="col-md-4">
              <label for="validationDefault02" class="form-label">Last name</label>
              <input type="text" class="form-control" id="validationDefault02" value="Doe" required>
            </div>
            <div class="col-md-4">
              <label for="validationDefaultUsername" class="form-label">Username</label>
              <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationDefault03" class="form-label">City</label>
              <input type="text" class="form-control" id="validationDefault03" required>
            </div>
            <div class="col-md-3">
              <label for="validationDefault04" class="form-label">State</label>
              <select class="form-select" id="validationDefault04" required>
                <option selected disabled value="">Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="col-md-3">
              <label for="validationDefault05" class="form-label">Zip</label>
              <input type="text" class="form-control" id="validationDefault05" required>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                  Agree to terms and conditions
                </label>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
          </form>
          <!-- End Browser Default Validation -->

        </div>
      </div>

    </div>

    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
               
        </div>
      </div>
    </div>
  </div>
</section>

</main><!-- End #main -->
