@extends('backend.layouts.app')

@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.article.edit.header')
 <div class="content">
   @include('backend.article.edit.form')
 </div>
 @include('backend.layouts.footers.footer')
@endsection
@section('page_scripts')
 <!-- CKeditor -->
 <script src='{{ URL::asset('ckeditor/ckeditor.js') }}'></script>
 <script type="text/javascript">
 $( document ).ready(function() {
  $("#image").on('change',function(){
   $('#filearray').empty();
   for (var i = 0; i < this.files.length; i++) {
    var img = document.createElement("IMG");
    var col = document.createElement("div");
    var image = document.createElement("div");
    $(col).addClass('col-md-6');
    $(image).addClass('image');
    img.src = window.URL.createObjectURL(this.files[i]);
    $(image).prepend(img);
    $(col).prepend(image);
    $('#filearray').addClass('border border-success');
    $('#filearray').prepend(col);
   }
  });
  });
 </script>
@endsection
