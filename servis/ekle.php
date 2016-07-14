<!-- Button trigger modal -->
<a href="#"  data-toggle="modal" data-target="#myModal" >
<span class="glyphicon glyphicon-plus"></span>
  Kurum Ekle
</a>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Kurum ve Kuruluş Ekleme Ekranı</h4>
      </div>
      <div class="modal-body">
        <!-- Ekle -->
		<form>
		
  <div class="form-group">
    <label >Kurum / Kuruluş Adı:</label>
    <input type="text" class="form-control" placeholder="Firma İsmi">
  </div>
  <div class="form-group">
    <label >Kurum / Kuruluş Türü:</label>
    <input type="text" class="form-control" placeholder="Tür">
  </div>
  <div class="form-group">
    <label >İl</label>
    <input type="text" class="form-control" placeholder="İl">
  </div>
  <div class="form-group">
    <label >İlçe</label>
    <input type="text" class="form-control" placeholder="İlçe">
  </div>
    <div class="form-group">
    <label >Adres</label>
    <input type="text" class="form-control" placeholder="Adres">
  </div>
    <div class="form-group">
    <label >Tel 1</label>
    <input type="text" class="form-control" placeholder="Tel 1">
  </div>
    <div class="form-group">
    <label >Tel 2</label>
    <input type="text" class="form-control" placeholder="Tel 2">
  </div>
      <div class="form-group">
    <label >Fax</label>
    <input type="text" class="form-control" placeholder="Fax">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">E-mail</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="E-mail">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Resim Yükle</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Bütün bilgileri eksiksiz doldurduğunuzdan emin olduktan sonra kaydedebilirsiniz.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Yükle</button>
</form>
		
		<!-- Ekle Son -->
		
		
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-primary">Kaydet</button>
      </div>
    </div>
  </div>
</div>