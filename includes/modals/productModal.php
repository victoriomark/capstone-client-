
<!-- Modal for adding products -->
<form class="modal fade" enctype="multipart/form-data" id="product_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div style="background-color: #660ff1" class="modal-header">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" name="productName" class="form-control" id="productName" placeholder="Product Name">
                    <label for="productName">Product Name</label>
                    <div id="productName_msg" class="invalid-feedback"></div>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" min="1" name="ProductPrice" class="form-control" id="ProductPrice" placeholder="Price">
                    <label for="ProductPrice">Price</label>
                    <div id="ProductPrice_msg" class="invalid-feedback"></div>
                </div>

               <div>
                   <select name="categoryName" id="categoryName" class="form-select mb-3" aria-label="Default select example">
                       <option value="" selected>Select Category</option>
                   </select>
                    <div id="categoryName_msg" class="invalid-feedback"></div>
               </div>

                <div>
                    <div class="form-floating">
                        <textarea name="productDescription" class="form-control" placeholder="Description" id="productDescription" style="height: 100px"></textarea>
                        <label for="productDescription">Description</label>
                    </div>
                    <div class="text-danger" id="productDescription_msg"></div>
                </div>

               <div class="p-2">
                   <label style="border: dotted #660ff1;" class="p-4 rounded-2 mt-3">
                       <input type="file" accept="image/jpeg,image/png" name="image"  class="form-control" id="image">
                   </label>
                   <div id="image_msg" class="invalid-feedback"></div>
               </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button style="background-color: #660ff1" type="submit" class="btn text-light">Add Now</button>
            </div>
        </div>
    </div>
</form>