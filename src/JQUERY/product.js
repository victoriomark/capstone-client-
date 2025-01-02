$(document).ready(function (){

    $(document).on('submit','#product_modal',function (event){
        event.preventDefault()

        var Data = new FormData(this)
        Data.append('action','store')

        $.ajax({
            url: '../controllers/productController.php',
            type: 'post',
            data: Data,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (res){
               function MessageEroor(fild,message){
                   if (message){
                       $(`#${fild}_msg`).html(message)
                       $(`#${fild}`).addClass('is-invalid')
                   }else {
                       $(`#${fild}_msg`).html('')
                       $(`#${fild}`).removeClass('is-invalid')
                   }
               }

               if (res.errors){
                   MessageEroor('productName',res.errors.productName)
                   MessageEroor('ProductPrice',res.errors.ProductPrice)
                   MessageEroor('categoryName',res.errors.categoryName)
                   MessageEroor('productDescription',res.errors.productDescription)
                   return;
               }

               if (res.success === true){
                   Swal.fire({
                       text: res.message,
                       icon: "success"
                   });
                   setTimeout(() =>{window.location.reload()},1000)
               }

                if (res.success === false){
                    Swal.fire({
                        text: res.message,
                        icon: "error"
                    });
                }
            }
        })

    })


    $(document).on('submit','.updateProductForm',function (event){ // update product
        event.preventDefault()

        var Data = new FormData(this)
        Data.append('action','update')
        $.ajax({
            url: '../controllers/productController.php',
            type: 'post',
            data: Data,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (res){
                if (res.success === true){
                    Swal.fire({
                        text: res.message,
                        icon: "success",
                        showConfirmButton: false
                    });
                    setTimeout(() =>{window.location.reload()},2000)
                }

                if (res.success === false){
                    Swal.fire({
                        text: res.message,
                        icon: "error"
                    });
                }

            }
        })

    })


    $(document).on('click','#btn_edit_product',function (id){ // show modal for edit product
        $.ajax({
            url: '../controllers/productController.php',
            type: 'post',
            data: {id:id.target.value,action: 'showBaseOnId'},
            success: function (res){
                $('body').append(res)
                $(`#product_modal_${id.target.value}`).modal('show')
            }
        })
    })

    // for active and inactive product
    $(document).on('click','#btn_archive',function (id){
        Swal.fire({
            title: "Are you sure?",
            text: "This action is irreversible. Are you sure you want to proceed?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
               // ajax request for archive product
                $.ajax({
                    url: '../controllers/productController.php',
                    type: 'post',
                    data: {id:id.target.value,action: 'archive'},
                    dataType: 'json',
                    success: function (res){
                        if (res.success === true){
                            Swal.fire({
                                text: res.message,
                                icon: "success",
                                showConfirmButton: false
                            });
                            setTimeout(() =>{window.location.reload()},2000)
                        }

                        if (res.success === false){
                            Swal.fire({
                                text: res.message,
                                icon: "error"
                            });
                        }
                    }
                })
            }
        });
    })
})