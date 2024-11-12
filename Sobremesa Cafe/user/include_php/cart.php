<!-- Modal -->
<div class="modal fade" id="singlePage" tabindex="-1" role="dialog" aria-labelledby="singlePageLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 1000px;max-height: 1000px;">
    <!-- Adjust the width of the modal -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Product Details</h5>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      <div class="modal-body">
        <!-- Reduced margin for better fit -->

        <div class="card">
          <div class="row">
            <div class="col-md-6">
              <div class="images p-3">
                <div class="text-center p-4">
                  <img id="main-image" src="https://i.imgur.com/Dhebu4F.jpg" width="100%" style="max-width: 500px;" />
                  <!-- Responsive image -->
                </div>
                <div class="thumbnail text-center">
                  <img onclick="change_image(this)" src="https://i.imgur.com/Rx7uKd0.jpg" width="70px"
                    style="cursor: pointer;">
                  <img onclick="change_image(this)" src="https://i.imgur.com/Dhebu4F.jpg" width="70px"
                    style="cursor: pointer;">
                </div>
              </div>
            </div>
            <div class="col-md-6">

              <div class="mt-4 mb-3">
                <span class="text-uppercase text-muted brand">Orianz</span>
                <h5 class="text-uppercase">Men's slim fit t-shirt</h5>
                <div class="price d-flex flex-row align-items-center">
                  <span class="act-price">$20</span>
                  <div class="ml-2">
                    <small class="dis-price">$59</small>
                    <span>40% OFF</span>
                  </div>
                </div>
              </div>
              <p>Shop from a wide range of t-shirts from Orianz. Perfect for your everyday use,
                you could pair it with a stylish pair of jeans or trousers to complete the look.</p>
              <div class="sizes mt-5">
                <h6 class="text-uppercase">Size</h6>
                <label class="radio">
                  <input type="radio" name="size" value="S" checked>
                  <span>S</span>
                </label>
                <label class="radio">
                  <input type="radio" name="size" value="M">
                  <span>M</span>
                </label>
                <label class="radio">
                  <input type="radio" name="size" value="L">
                  <span>L</span>
                </label>
                <label class="radio">
                  <input type="radio" name="size" value="XL">
                  <span>XL</span>
                </label>
                <label class="radio">
                  <input type="radio" name="size" value="XXL">
                  <span>XXL</span>
                </label>
              </div>
              <div class="col-md-4 col-6 mb-3">
                <label class="mb-2 d-block">Quantity</label>
                <div class="input-group mb-3" style="width: 170px;">
                  <button class="btn btn-white border border-secondary px-3" type="button">
                    -
                  </button>
                  <input type="text" class="form-control text-center border border-secondary" placeholder="14"
                    aria-label="Example text with button addon" aria-describedby="button-addon1" />
                  <button class="btn btn-white border border-secondary px-3" type="button">
                    +
                  </button>
                </div>
              </div>
              <div class="cart mt-4 align-items-center">
                <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button>
                <i class="fa fa-heart text-muted"></i>
                <i class="fa fa-share-alt text-muted"></i>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>