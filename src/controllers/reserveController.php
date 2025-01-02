<?php

namespace controllers;
use models\cart;

include '../models/reservation.php';
include '../models/cart.php';
class reserveController
{
   public function createReservation():void
   {
       // handel the validation form for inputs
       $client = $_POST['clientId'];
       $Fields = [
           'ReservationDate' => 'Reservation Date is required',
           'Time' => 'Time is required',
           'EventType' => 'Event Type is required',
            'Reference' => 'Reference is required',
            'contactNumber' => 'Contact is required',
            'address' => 'address is required',
            'fullName' => 'Full Name is required',
             'email' => 'Email is required',
       ];

       $data = [];
       $error = [];

         foreach ($Fields as $field => $value){
              if (empty($_POST[$field])){
                $error[$field] = $value;
              }else{
                $data[$field] = htmlspecialchars($_POST[$field]) ;
              }
         }

       // handle the image upload
       $image = $_FILES['image'];
       $fileDirectory = '../proofPaymentUpload/';

       if (empty($image['name'])){
           $error['image'] = 'Image is required';
       }

       if (!empty($error)){ // if there is an error
              $data['success'] = false;
              $data['errors'] = $error;
              echo json_encode($data);
             return;
         }

       $reservation = new \models\reservation();
       if ($reservation->checkIfBookingIsAlreadyExist($client)){ // check if the booking is already exist to avoid double booking
           echo json_encode(['success' => false, 'message' => 'A reservation already exists for this client.']);
           return;
       }

       // check if the date is already booked
        $dateToday = date('Y-m-d');
           if ($reservation->checkIfDateIsAlreadyBooked($dateToday)){
               echo json_encode(['success' => false, 'message' => 'The date is already booked']);
               return;
           }

       if ($image && !empty($image['name'])){
           $fileInfo = pathinfo($image['name']);
           $fileExtension = strtolower($fileInfo['extension']);
           $fileName = uniqid('proofPayment_').'.'.$fileExtension;
           $uploadPath = $fileDirectory . $fileName;


           if (!move_uploaded_file($image['tmp_name'], $uploadPath)){
               $data['success'] = false;
               $data['message'] = 'Failed to upload image';
               echo json_encode($data);
               return;
           }
           $data['image'] = $fileName; // store the image name in the database
       }
       // store the data in the database
         $reservation->store($data['ReservationDate'], $data['Time'], $data['EventType'], $data['fullName'], $data['contactNumber'], $data['address'], $client, $data['image'], $data['Reference'],$data['email']);
          // to remove delete items in cart after success booking
          $cartItems = new  cart();
          $cartItems->RemoveItemBaseOnClientId($client);
   }


   // show reservation List
    public function show():void
    {
         $reservation = new \models\reservation();
         $data = $reservation->show();
         $TableTr = '';
         if ($data){
              foreach ($data as $row){

                  $status = match ($row['status']) {
                      'Paid' => '<span class="badge bg-info">Paid</span>',
                      'Completed' => '<span class="badge bg-success">Completed</span>',
                      'Cancel' => '<span class="badge bg-danger">Cancel</span>',
                      default => '<span class="badge bg-primary">Pending</span>',
                  };

                  $TableTr .= '
                      <tr>
                          <th>'.$row['ReservationId'].'</th>
                            <td>'.$row['Date'].'</td>
                            <td>'.$row['time'].'</td>
                            <td>'.$row['eventType'].'</td>
                            <td>'.$row['Name'].'</td>
                            <td>'.$row['contact'].'</td>
                            <td>'.$row['Address'].'</td>
                            <td>'.$row['proofPayment'].'</td>
                            <td>'.$row['Reference'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>
                              '.$status.'
                            </td>
                            <td>
                         <select class="form-select bg-primary badge p-2" aria-label="Default select example">
                              <option value="" selected>'.$row['status'].'</option>
                                  <option value="'.$row['status'].'">'.$row['status'].'</option>
                                  <option value="Paid">Paid</option>
                                  <option value="Completed">Completed</option>
                                  <option value="Cancel">Cancel</option>
                              </select>
                           </td>
                      </tr>                  
                  ';
              }
         }else{
                $TableTr .= '
                    <tr>
                        <td colspan="11">No Reservation Found</td>
                    </tr>
                ';
         }
         echo $TableTr;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])){
    $reserve = new reserveController();
    switch ($_POST['action']){
        case 'reserve':
            $reserve->createReservation();
            break;
        default:
            echo "Method is not allowed";
    }

}