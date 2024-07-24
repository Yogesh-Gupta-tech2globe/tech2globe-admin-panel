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
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">File Management</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item">File Management</li>
            <li class="breadcrumb-item active">{{ $pageName }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

 
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $pageName }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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

                <label for="" class="mt-2 mb-2">Code of CSS File*</label>
                <div id="editor">
                  {{$content}}
                </div>

                <form action="{{ url('admin/css-files') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                    
                      <div class="form-group">
                        <textarea id="fileContent" style="display: none" name="fileCode"></textarea>
                      </div>
                    
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
    editor.session.setMode("ace/mode/css");

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
