<?php

namespace controllers;
use models\product;

require_once '../models/product.php';
class productController
{
  public function store():void
  {
      // validation
      $fields = [
          'productName' => 'productName Is required',
          'ProductPrice' => 'productPrice Is required',
          'categoryName' => 'categoryName Is required',
          'productDescription' => 'Description Is required'
      ];
      $image = $_FILES['image'];
      $FileDir = '../ProductImageUpload/';


      $data = [];
      $errors = [];

      foreach ($fields as $field => $message) {
          if (!isset($_POST[$field]) || trim($_POST[$field]) == '') {
              $errors[$field] = $message;
          }else{
              $data[$field] = htmlspecialchars($_POST[$field]);
          }
      }

      if ($image && !empty($image['name'])) {
          $fileInfo = pathinfo($image['name']);
          $fileExtension = strtolower($fileInfo['extension']);
          $fileName = uniqid() . '.' . $fileExtension;
          $UploadFilePath = $FileDir . $fileName;

          if (!move_uploaded_file($image['tmp_name'], $UploadFilePath)) {
           echo json_encode(['success' => false, 'message' => 'Upload failed']);
           return;
          }
          $data['image'] = $fileName;
      }

      if (!empty($errors)) {
          $data['success'] = false;
          $data['errors'] = $errors;
          echo json_encode($data);
          return;
      }

      // call the method to store date into database product Table
      $product = new Product();
      $product->store($data['productName'], $data['ProductPrice'],$data['image'], $data['categoryName'],$data['productDescription']);
  }

  public function show():void
  {
      $product = new Product();
      $status = 'Active';
      $TableTr = '';

      $data = $product->showAllProducts($status);

      if ($data){
          foreach ($data as $product) {
              $TableTr .= '
              <tr>
              <th>'.$product['ProductId'].'</th>
                <td>
                 <img class="rounded-circle" style="height: 50px; width: 50px" src="../src/ProductImageUpload/'.$product['ProductImage'].'" alt="image"> </td>
                  <td>'.$product['ProductName'].'</td>
                  <td>'.$product['ProductCategory'].'</td>
                  <td>'.$product['Price'].'</td>
                  <td>
                  <button id="btn_edit" value="'.$product['ProductId'].'" class="btn btn-primary">Edit</button>
                   <button class="btn btn-danger">Archive</button>
                 </td>

           </tr>
          ';
          }
          echo $TableTr;
      }else{
         echo "<tr><td colspan='6'>No Product Available</td></tr>";
      }
  }

  public function showBaseOnId():void
  {
      $id = $_POST['id'];
      $product = new product();

      if (!isset($id)){
          echo "No Id";
          return;
      }
      $data = $product->showBaseOnId($id);
      $modal = '';
      foreach ($data as $row){
          $modal .= '
        <!-- Modal for Updating products -->
        <form class="modal fade updateProductForm" enctype="multipart/form-data" id="product_modal_'.$id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div style="background-color: #660ff1" class="modal-header">
                        <h5 class="modal-title text-light" id="staticBackdropLabel">Update Product Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" value="'.$row['ProductName'].'" name="productName" class="form-control" id="productName" placeholder="Product Name">
                            <label for="productName">Product Name</label>
                            <div id="productName_msg" class="invalid-feedback"></div>
                        </div>
        
                        <div class="form-floating mb-3">
                            <input type="number" min="1" value="'.$row['Price'].'" name="ProductPrice" class="form-control" id="ProductPrice" placeholder="Price">
                            <label for="ProductPrice">Price</label>
                            <div id="ProductPrice_msg" class="invalid-feedback"></div>
                        </div>
        
                   <div>
                       <select name="categoryName" id="categoryName" class="form-select" aria-label="Default select example">
                           <option value="'.$row['ProductCategory'].'" selected>'.$row['ProductCategory'].'</option>
                          
                       </select>
                        <div id="categoryName_msg" class="invalid-feedback"></div>
                   </div>
        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button style="background-color: #660ff1" type="submit" class="btn text-light">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
          ';

          echo $modal;
      }
  }

  public function productCard():void// to show product card on the menu page
  {
    $product = new Product();
    $status = 'Active';
    $category = $_POST['categoryName'];

    $data = $product->showAllBaseOnCategoryAndStatus($status,$category);
    $card = '';
    if ($data){
        foreach ($data as $product){
            $card .= '
                <!-- card start -->
            <div class="card text-center bg-transparent rounded-3 p-3 col-lg-2">
                <div class="card-image">
                    <img style="height: 20vh; object-fit: cover; " class="img-fluid" src="../ProductImageUpload/'.$product['ProductImage'].'" alt="Image">
                </div>
                <h5 class="card-title">'.$product['ProductName'].'</h5>
                <p class="card-price">₱'.$product['Price'].'</p>
                <div >
                    <button id="btn_productView" value="'.$product['ProductId'].'" style="background-color: #81e5d9" class="btn border-0">Order Now</button>
                </div>
            </div>
        <!-- card End -->
            ';
        }
        echo $card;
    }else{
        echo "<h1 class='text-light'>No Product Available</h1>";
    }
  }

    public function productAllCard():void// to show product card on the menu page
    {
        $product = new Product();
        $status = 'Active';

        $data = $product->showAllProducts($status);
        $card = '';
        if ($data){
            foreach ($data as $product){
                $card .= '
                <!-- card start -->
            <div class="card text-center bg-transparent rounded-3 p-3 col-lg-2">
                <div class="card-image">
                    <img style="height: 20vh; object-fit: cover; " class="img-fluid" src="../ProductImageUpload/'.$product['ProductImage'].'" alt="Image">
                </div>
                <h5 class="card-title">'.$product['ProductName'].'</h5>
                <p class="card-price">₱'.$product['Price'].'</p>
                <div >
                    <button id="btn_productView" value="'.$product['ProductId'].'" style="background-color: #81e5d9" class="btn border-0">Order Now</button>
                </div>
            </div>
        <!-- card End -->
            ';
            }
            echo $card;
        }else{
            echo "<h1 class='text-light'>No Product Available</h1>";
        }
    }

  public function showBaseOnIdInMenuPage():void
  {
      $id = $_POST['id'];

        if (!isset($id)){
            echo "No Id";
            return;
        }

      $product = new Product();
        $data = $product->showBaseOnId($id);
        $modal = '';

        foreach ($data as $row){
            $modal .= '
              <!-- Modal for Menu Add Cart -->
            <form class="modal fade form_forAddCART" id="productInfoModal_'.$row['ProductId'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div style="background-color: #1a202c" class="modal-content">
                  <div class="modal-body d-lg-flex justify-content-center  gap-3 p-2 align-items-center">
                       <img style="height: 30vh; object-fit: cover; " class="img-fluid" src="../ProductImageUpload/'.$row['ProductImage'].'" alt="Image">
                    <div>
                        <h5 class="card-title">'.$row['ProductName'].'</h5>
                        <p class="card-text">'.$row['description'].'</p>
                        <p class="card-price   ">₱'.$row['Price'].'</p>
                          <div class="mb-2">
                          <label class="text-light fw-bold" for="quantity"># of Pax</label>
                            <select name="numberOfPax" class="form-select" aria-label="Default select example">
                              <option value="" selected>Choose an option </option>
                              <option value="5">5 pax</option>
                              <option value="10">10 pax</option>
                              <option value="15">15 pax</option>
                            </select>
                         </div>
                    </div>
                     <!--hiddin inputs start -->
                    <input type="hidden" name="image" value="'.$row['ProductImage'].'">
                    <input type="hidden" name="productName" value="'.$row['ProductName'].'">
                    <input type="hidden" name="productPrice" value="'.$row['Price'].'">
                    <input type="hidden" name="ProductId" value="'.$row['ProductId'].'">
                      <!--hiddin inputs end -->
                  </div>
                  <div class="d-flex justify-content-end gap-3 p-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button style="background-color: #81e5d9" type="submit" class="btn">Add Cart</button>
                  </div>
                </div>
              </div>
            </div>
            ';
        }
        echo $modal;
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $product = new productController();

    switch ($_POST['action']) {
        case 'store':
            $product->store();
            break;
        case 'showBaseOnId':
            $product->showBaseOnId();
            break;
        case 'showedByCategory':
            $product->productCard();
            break;
        case 'showBaseOnIdInMenuPage':
            $product->showBaseOnIdInMenuPage();
            break;
        default:
            echo "Method not allowed";
            break;
    }
    return;
}
