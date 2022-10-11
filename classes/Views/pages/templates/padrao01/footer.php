</div>
   </section>


<div id="exampleModal" class="modal fade" tabindex="12" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button id="closemodal" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
        <!--========== JS ==========-->

        <script>
          const URL_PAINEL = "<?= INCLUDE_PATH ?>";
          const URL_LOJA_VIEWS = "<?= URL_LOJA_VIEWS ?>";
          
        </script>
        <script src="https://cdn.tiny.cloud/1/5cf043suqzfth7j9dzg600xpmdnmysvvauwpc3esitqdn3ah/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="<?= INCLUDE_PATH_VIEWS?>pages/javascript/jquery.maskMoney.js"></script>
        <script src="<?= INCLUDE_PATH_VIEWS?>pages/javascript/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        
   
       
    </body>
</html>