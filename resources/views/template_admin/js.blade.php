

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>

  <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('assets/ckeditor/adapters/jquery.js') }}"></script>
 
  <!-- JS Libraies -->

  <script src="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
  
  <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
  <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
  <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
  <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
  <script src="{{asset('assets/modules/datatables/datatables.min.js') }}"></script>
  <script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>    
  <script src="{{asset('assets/modules/summernote/summernote-bs4.js') }}"></script>


  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

<!-- Page Specific JS File -->

  

  <script>
    @if(Session::has('info'))
    
       iziToast.info({
        title: 'Info!',
        message: '{{ Session('info')}}',
        position: 'bottomRight'
        });
      
    @endif

    @if(Session::has('success'))
    
       iziToast.success({
        title: 'Info!',
        message: '{{ Session('success')}}',
        position: 'bottomRight'
        });
      
    @endif

    @if(Session::has('delete'))
    
       iziToast.warning({
        title: 'Deleted!',
        message: '{{ Session('delete')}}',
        position: 'bottomRight'
        });
      
    @endif
  </script>

