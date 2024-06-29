@extends('admin.layout.layout')
@section('content')

<style type="text/css" media="screen">
  #editor { 
    width: 100%;
    height: 800px;
  }

  .zoom-controls {
      margin-bottom: 10px;
  }
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if(Session::has('success_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success:</strong>{{ Session::get('success_message') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    @if(Session::has('error_message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error:</strong>{{ Session::get('error_message') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">File Management</li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
              @if(!empty($fileData['id']))
                <a style="max-width: 150px; float: right; display: inline-block;" href="/admin/page/{{ $fileData['id'] }}" target="_blank" class="btn btn-block btn-primary">View Page</a>
              @endif
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                 <!-- form start -->
                 @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                @endif
                @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error:</strong>{{ Session::get('error_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif

                <div class="controls mb-3">
                  <label>Editor Controls:</label><br>
                    <button id="zoom-in" class="btn btn-warning">Zoom In</button>
                    <button id="zoom-out" class="btn btn-danger">Zoom Out</button>
                    <label class="mx-5">
                        <input type="checkbox" id="wrap-code" /> Wrap Code
                    </label>
                    <br>
                    <label for="themeSelector">Select Theme: </label>
                    <select id="themeSelector" class="form-control"></select>
                    
                </div>

                <label for="email" class="mt-2 mb-2">Enter Code of File*</label>
                <div id="editor">
                  @if(!empty($fileData['file_code']))
                    {{ htmlspecialchars_decode($fileData['file_code']) }}
                  @else
                      
                  @endif
                </div>
                
                <form @if(empty($fileData['id'])) action="{{ url('admin/add-edit-file') }}" @else action="{{ url('admin/add-edit-file/'.$fileData['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                    
                      <div class="form-group">
                        <textarea id="fileContent" style="display: none" name="fileCode"></textarea>
                      </div>
                          
                      <div class="form-group">
                          <label for="email">File Name*</label>
                          <input type="text" class="form-control" id="fileName" name="fileName" placeholder="Enter File Name (Should be Unique)" required @if(!empty($fileData['file_name'])) value="{{ $fileData['file_name'] }}" readonly @endif>
                      </div>
                    
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ext-themelist.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/keybinding-vscode.js"></script>

  <script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/dracula");
    editor.session.setMode("ace/mode/php_laravel_blade");

    // Set VS Code key bindings
    editor.setKeyboardHandler("ace/keyboard/vscode");

    // Get the list of themes
    const themes = ace.require("ace/ext/themelist").themes;

    // Populate the dropdown with themes
    const themeSelector = document.getElementById('themeSelector');
    themes.forEach(theme => {
      const option = document.createElement('option');
      option.value = theme.theme;
      option.textContent = theme.caption;
      themeSelector.appendChild(option);
    });

    // Change theme dynamically
    themeSelector.addEventListener('change', function() {
      const selectedTheme = this.value;
      editor.setTheme(selectedTheme);
    });


    // Initial font size
    var fontSize = 14;
    editor.setFontSize(fontSize);

    // Set initial wrapping
    editor.session.setOption("wrap", true);

    // Zoom in and out functions
    document.getElementById('zoom-in').addEventListener('click', function() {
        fontSize += 2;
        editor.setFontSize(fontSize);
    });

    document.getElementById('zoom-out').addEventListener('click', function() {
        fontSize -= 2;
        editor.setFontSize(fontSize);
    });

    // Toggle wrap functionality
    document.getElementById('wrap-code').addEventListener('change', function() {
        var shouldWrap = this.checked;
        editor.session.setOption("wrap", shouldWrap);
    });

    // Copy editor content to textarea before submitting form
    document.querySelector('form').addEventListener('submit', function() {
        document.querySelector('#fileContent').value = editor.getValue();
    });

    document.addEventListener('keydown', function(event) {
        if ((event.ctrlKey && event.key === 's') || (event.ctrlKey && event.key === 'S')) {
            // Prevent the default save action
            event.preventDefault();
            // Execute custom logic here
            console.log('Ctrl + S was pressed!');
        }
    });

  </script>

@endsection

