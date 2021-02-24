<div class="card gedf-card">
   <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make
            a publication</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
         </li>
      </ul>
   </div>
   <div class="card-body">
      <form action="../controllers/createpost.controller.php" method="post" enctype="multipart/form-data">
         <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
               <div class="form-group">
                  <label class="sr-only" for="tittle_post">Título</label>
                  <input type="text" class="form-control mb-2" id="tittle_post" name="tittle_post" placeholder="¿Cómo lo titularías?" >
                  <label class="sr-only" for="text_post">post</label>
                  <textarea class="form-control mb-2" id="text_post" name="text_post" rows="3" placeholder="¿Qué te gustaría compartir?"></textarea>



                  <input type="checkbox" id="myCheck"  onclick="myFunction()">
                  <label for="myCheck">Contenido de 3º</label> 

                  <div id="text" style="display:none" class="text-muted h7 mb-2">
           
                     <div class="row">
                        <div class="col-sm-8">
                           <label class="sr-only" for="source_name">NOMBRE URL</label>
                           <input type="text" class="form-control mb-2" id="source_name" name="source_name" placeholder="¿De donde es la información?" >
                        </div>
                        <div class="col-sm-4">
                           <label class="sr-only" for="source_url">URL</label>
                           <input type="url" class="form-control mb-2" id="source_url" name="source_url" placeholder="URL">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
               <div class="form-group">
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="img_post" name="img_post">
                     <label class="custom-file-label" for="img_post">Imagen del Post</label>
                  </div>
               </div>
               <div class="py-4"></div>
            </div>
         </div>
         <div class="btn-toolbar justify-content-between">
            <div class="form-group">
               <input type="submit"  id="create_post" name="create_post" class="btn btn-primary" value="Compartir">
            </div>

            <div class="btn-group">
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                  <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Public</a>
                  <a class="dropdown-item" href="#"><i class="fa fa-users"></i> Friends</a>
                  <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Just me</a>
               </div>
               <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
               <i class="fa fa-globe"></i>
               </button>
            </div>
         </div>
         <?php
         require_once("./modules/alertserrors.php")
         ?>
      </form>
   </div>
</div>


