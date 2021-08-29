<script src="/js/pdf.js"></script>

<div class="type-7">
    <div class="row">
        <div class="col-12">
            
            <div class="text">
                <canvas id="the-canvas" style="width:100%;"></canvas>
            </div>
            <div class="pdf-nav">
                <button id="prev"><</button>
                <span><span id="page_num"></span> / <span id="page_count"></span></span>
                <button id="next">></button>
                <!--<select id="spec" onchange="onSpecPage()">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>-->
            </div>
            <script>
            // If absolute URL from the remote server is provided, configure the CORS
            // header on that server.
            var url = '{{ $page->pdf }}';

            // Loaded via <script> tag, create shortcut to access PDF.js exports.
            var pdfjsLib = window['pdfjs-dist/build/pdf'];

            // The workerSrc property shall be specified.
            pdfjsLib.GlobalWorkerOptions.workerSrc = '/js/pdf.worker.js';

            var pdfDoc = null,
                pageNum = 1,
                pageRendering = false,
                pageNumPending = null,
                scale = 2,
                canvas = document.getElementById('the-canvas'),
                ctx = canvas.getContext('2d');

            /**
            * Get page info from document, resize canvas accordingly, and render page.
            * @param num Page number.
            */
            function renderPage(num) {
            pageRendering = true;
            // Using promise to fetch the page
            pdfDoc.getPage(num).then(function(page) {
                var viewport = page.getViewport({scale: scale});
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page into canvas context
                var renderContext = {
                canvasContext: ctx,
                viewport: viewport
                };
                var renderTask = page.render(renderContext);

                // Wait for rendering to finish
                renderTask.promise.then(function() {
                pageRendering = false;
                if (pageNumPending !== null) {
                    // New page rendering is pending
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
                });
            });

            // Update page counters
            document.getElementById('page_num').textContent = num;
            }

            /**
            * If another page rendering in progress, waits until the rendering is
            * finised. Otherwise, executes rendering immediately.
            */
            function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
            }

            /**
            * Displays previous page.
            */
            function onPrevPage() {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
            }
            document.getElementById('prev').addEventListener('click', onPrevPage);

            /**
            * Displays next page.
            */
            function onNextPage() {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
            }
            document.getElementById('next').addEventListener('click', onNextPage);

            /**
            * Page number input
            */
            function onSpecPage() {
            pageNum = parseInt(document.getElementById("spec").value);
            queueRenderPage(pageNum);
            console.log(pageNum);
            }

            /**
            * Asynchronously downloads PDF.
            */
            pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
            pdfDoc = pdfDoc_;
            document.getElementById('page_count').textContent = pdfDoc.numPages;

            // Initial/first page rendering
            renderPage(pageNum);
            });
            </script>
            
        </div>
    </div>
</div>