@extends('lms.main')
@section('container')
<link rel="stylesheet" href=" {{ asset('css/pageChat.css')}}">

<div class="Content px-4 px-lg-5">
    <div class="row">
        {{-- <div class="col mx-auto">
            <iframe class="responsive-iframe" src="https://www.youtube.com/embed/UqA7zfsVlIg?list=RD0LxdzHBmCCM"
                title="NDX AKA - Nemen HipHop Dangdut Version ( Official Lyric Video )" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="row mt-3">
                <div class="col-md-7 col-sm-6 col-12">
                    <div class="top_profile">
                        <div class="tp_left d-flex align-items-center gap-4">
                            <div class="tpl_img">
                                <img src="{{asset ('../img/senbud-icon.png')}} " alt="" class="">
                            </div>
                            <div class="tpl_title">
                                <p class="mb-0 fw-bold">{{$sub_materi->nama}}</p>
                                <br> Author : Fulan
                            </div>
                        </div>

                        <p class="mb-0 mt-4">{{$sub_materi->deskripsi}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row mt-3">
                <div class="col-md-12 px-1">
                    <a href="{{url('/')}}/add-status/{{$sub_materi->id}}" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"></i> Selesai Materi</a>
                    <div class="navigation-buttons" style="float: right">
                        <button class="btn btn-sm btn-primary" id="prevPageBtn"><i class="fa fa-arrow-left"></i> Previous</button>
                        <span>Page : <span id="pageKe"></span> / <span id="totalHalaman"></span></span>
                        <button class="btn btn-sm btn-primary" id="nextPageBtn">Next <i class="fa fa-arrow-right"></i></button>
                    </div>
                    <div class="" style="margin-top: 2%; padding: 10px 70px; background-color:#3b3b3b; border-radius:5px">
                        <div id="pdfContainer"></div>
                    </div>
        
                    <!-- Include PDF.js library -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>
        
                    <!-- Your custom JavaScript to load and display the PDF -->
                    {{-- <script src="path/to/your/custom-script.js"></script> --}}
                </div>
            </div>
        </div>
    </div>
</div>

   {{-- Jquery --}}
   <script src="{{ asset('https://code.jquery.com/jquery-3.6.3.min.js')}} " integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="text/javascript"></script>

   <script>

function updateNavigationButtons() {
    const prevPageBtn = document.getElementById('prevPageBtn');
    const nextPageBtn = document.getElementById('nextPageBtn');

    prevPageBtn.disabled = currentPageNumber === 1;
    nextPageBtn.disabled = currentPageNumber === pdfDoc.numPages;
    document.getElementById('pageKe').innerHTML= currentPageNumber
    document.getElementById('totalHalaman').innerHTML= pdfDoc.numPages
}

let currentPageNumber = 1;
let pdfDoc = null;

// Load and display the PDF
function renderPdf(url) {
    const pdfContainer = document.getElementById('pdfContainer');

    // Load PDF document
    pdfjsLib.getDocument(url).promise.then(pdf => {
        pdfDoc = pdf; // Store the PDF document
        renderPage(currentPageNumber);
    });
}

// Previous page button click event handler
document.getElementById('prevPageBtn').addEventListener('click', () => {
    if (currentPageNumber > 1) {
        renderPage(currentPageNumber - 1);
    }
});

// Next page button click event handler
document.getElementById('nextPageBtn').addEventListener('click', () => {
    if (currentPageNumber < pdfDoc.numPages) {
        renderPage(currentPageNumber + 1);
    }
});

// Call the

    // Render a specific page of the PDF
function renderPage(pageNumber) {
    const pdfContainer = document.getElementById('pdfContainer');
    pdfContainer.innerHTML = ''; // Clear previous content

    // Load the desired page
    pdfDoc.getPage(pageNumber).then(page => {
        // Set the scale based on your preference
        const scale = 1.5;
        const viewport = page.getViewport({ scale });

        // Create a canvas for the page
        const canvas = document.createElement('canvas');
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        pdfContainer.appendChild(canvas);

        // Render the page content on the canvas
        const ctx = canvas.getContext('2d');
        const renderContext = {
            canvasContext: ctx,
            viewport: viewport,
        };
        page.render(renderContext);

        // Update current page number
        currentPageNumber = pageNumber;

        // Update navigation buttons state
        updateNavigationButtons();
    });
}

    $(document).ready(function(){
        $('#btn-balasan').click(function(){
            $('#balasan').toggle(500);
        })

        // Call the function to render the PDF
        // const pdfUrl = '{{$sub_materi->file_location}}';
        const pdfUrl = 'http://localhost:8080/storage/data_upload_lms/8e6aOXYVocRerNj0llm6zvhxjg7hRGFsWwWTyhGD.pdf';
        renderPdf(pdfUrl);
        updateNavigationButtons();
    }) 

    jQuery($ => {
        $("#switchVal").on("input", function() {
        $("#all-komentar").toggle(250);
        });
    });
</script>
@endsection