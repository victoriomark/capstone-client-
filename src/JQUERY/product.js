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


    $(document).on('submit','.updateProductForm',function (event){
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
                console.log(res)
            }
        })

    })


    $(document).on('click','#btn_edit',function (id){

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
})