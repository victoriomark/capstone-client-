
<!-- Modal for adding products -->
<form method="post" action="#" class="modal fade" id="category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div style="background-color: #660ff1" class="modal-header">
                <h5 class="modal-title text-light" id="staticBackdropLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" name="categoryName" class="form-control" id="categoryName" placeholder="categoryName">
                    <label for="categoryName">Category Name</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button style="background-color: #660ff1" type="submit" class="btn text-light">Add Now</button>
            </div>
        </div>
    </div>
</form>