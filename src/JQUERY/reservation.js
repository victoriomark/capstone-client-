$(document).ready(function (){    $(document).on('submit','#forRservation',function (event){        event.preventDefault()        var DataForm = new FormData(this)        DataForm.append('action','reserve')        $.ajax({            url: '../controllers/reserveController.php',            type: 'POST',            data: DataForm,            contentType: false,            cache: false,            processData: false,            dataType: 'json',            success: function (response){                console.log(response)                function MessageEroor(fild,message){                    if (message){                        $(`#${fild}_msg`).html(message)                        $(`#${fild}`).addClass('is-invalid')                    }else {                        $(`#${fild}_msg`).html('')                        $(`#${fild}`).removeClass('is-invalid')                    }                }                if (response.errors){                    MessageEroor('image',response.errors.image)                    MessageEroor('Reference',response.errors.Reference)                    MessageEroor('ReservationDate',response.errors.ReservationDate)                    MessageEroor('EventType',response.errors.EventType)                    MessageEroor('Time',response.errors.Time)                    MessageEroor('email',response.errors.email)                    MessageEroor('address',response.errors.address)                    MessageEroor('fullName',response.errors.fullName)                    MessageEroor('contactNumber',response.errors.contactNumber)                    return;                }            }        })    })})