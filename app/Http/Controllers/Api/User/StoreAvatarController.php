<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreAvatarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // public function __invoke(Request $request): JsonResponse
    // {
    //      $folderPath = public_path('uploads/');
    //     //var_dump($request,$folderPath);
    //     //$image_parts = explode(";base64,", $request->profile);
    //     //$image_type_aux = explode("image/", $image_parts[0]);
    //     //$image_type = $image_type_aux[1];
    //     //$image_base64 = base64_decode($image_parts[1]);

    //     if ($request->hasFile('profile')) {
    //      $name_image = $request->profile->getClientOriginalName();
    //     } else {
    //         $name_image = null;
    //     }



    //     $image_parts = explode(";base64,", $request->profile);
    //    // $image_type_aux = explode("tmp'\'\' ",$image_parts[0]);
    //     $imageName = uniqid() . '.png';

    //     //$imageFullPath = $folderPath.$imageName;
    //     $imageFullPath = $folderPath.$name_image;

    //     //file_put_contents($imageFullPath, $image_base64);
    // file_put_contents($imageFullPath, $name_image);
    //     //file_put_contents($imageFullPath, $imageFullPath);

    //     //   $saveFile = new User();
    //        $saveFile = User::find(2);
    //     //   $saveFile->avatar = $imageName;
    //     //   $saveFile->save();

    //     return response()->json([
    //                 'success'=>'Crop Image Uploaded Successfully',
    //                 'image_parts'=> $image_parts,
    //                 'imageFullPath'=> $imageFullPath,
    //                 'imageName'=> $imageName,
    //                 'saveFile'=> $saveFile,
    //                 //'idUser' =>$idUser,
    //                 'fichiers' => $folderPath,
    //                 'name_image' => $name_image,
    //                         ]);
    // }

    public function __invoke(Request $request,$id): JsonResponse
    {
         // Récupération des données texte du FormData
        $name = $request->name;
        $email = $request->email;
        $profileName = $request->profile;

             // Mise à jour de l'utilisateur
        $user = User::find($id);

            if ($user) {
               // $user->avatar = $filePath; // ou juste $fileName selon votre structure
                $user->name = $name;
                $user->email = $email;
                $user->save();
            }

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'data' => [
                'user_id' => $id,
                'name' => $name,
                'email' => $email,
                'requetes' => $request->all(),
                'user' => $user ?? null,
                'profile_name' => $profileName,
            ]
        ]);
    }
}
