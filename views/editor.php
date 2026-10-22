<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Text Editor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        #editor {
            border: 1px solid #ccc;
            min-height: 200px;
            padding: 10px;
            margin: 10px;
        }
        button {
            margin: 5px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div id="editor" contenteditable="true" style='height:200px;overflow:auto;'></div>
    <pre id="sourceCode" contenteditable="true"  style="display: none; height:200px;overflow:auto;"></pre>
    <br>
    <button onclick="formatText('bold')">Bold</button>
    <button onclick="formatText('italic')">Italic</button>
    <button onclick="formatText('underline')">Underline</button>
    <button onclick="formatText('insertOrderedList')">Numbered List</button>
    <button onclick="formatText('insertUnorderedList')">Bullet List</button>
    <button onclick="changeIndentation(20)">Indent</button>
    <button onclick="changeIndentation(-20)">Decrease Indent</button>
    <button onclick="addVideo()">Add Video</button>
    <button onclick="addImage()">Add Image</button>
    <button onclick="insertTable()">Insert Table</button>
    <button onclick="deleteTable()">Delete Table</button>
    <button onclick="insertRow()">Insert Row</button>
    <button onclick="deleteRow()">Delete Row</button>
    <button onclick="insertColumn()">Insert Column</button>
    <button onclick="deleteColumn()">Delete Column</button>
    <button onclick="addLink()">Add Link</button>
    <button onclick="unlink()">Unlink</button>
    <button onclick="toggleMaximize()">maxMin</button> 
    <button onclick="toggleSourceCodeView()">Source</button>
    <button onclick="applyBlockQuote()">Block Quote</button> 
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Heading 
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li onclick="applyHeading('div')"><a class="dropdown-item" href="#" >Normal</a></li> 
        <li onclick="applyHeading('H1')"><a class="dropdown-item" href="#" >H1</a></li> 
        <li onclick="applyHeading('H2')"><a class="dropdown-item" href="#" >H2</a></li> 
        <li onclick="applyHeading('H3')"><a class="dropdown-item" href="#" >H3</a></li>  
      </ul>
    </div>

    <button onclick="undo()">Undo</button>
    <button onclick="redo()">Redo</button>

    <!-- Bootstrap Modal for Adding Link -->
    <div class="modal fade" id="linkModal" tabindex="-1" role="dialog" aria-labelledby="linkModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="linkModalLabel">Add Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="linkText">Link Text:</label>
                        <input type="text" class="form-control" id="linkText">
                    </div>
                    <div class="form-group">
                        <label for="linkType">Link Type:</label>
                        <select class="form-control" id="linkType">
                            <option value="url">URL</option>
                            <option value="email">Email</option>
                            <option value="call">Call</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="linkUrl">Link URL:</label>
                        <input type="text" class="form-control" id="linkUrl">
                    </div>
                    <div class="form-group">
                        <label for="target">Target:</label>
                        <select class="form-control" id="target">
                            <option value="">--Not set--</option>
                            <option value="_blank">New Window</option>
                            <option value="_self">Same Window</option>
                            <option value="_parent">Parent Window</option>
                            <option value="_top">Top Window</option>
                            <option value="iframe">iFrame</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="insertLink()">Insert Link</button>
                </div>
            </div>
        </div>
    </div> 
    <script>
        const editor = document.getElementById('editor');
        const undoStack = [];
        const redoStack = [];

        function formatText(command, value = null) {
            document.execCommand(command, false, value);
            saveState();
        }

        function changeIndentation(delta) {
            const selection = window.getSelection();
            const range = selection.getRangeAt(0);
            const startContainer = range.startContainer;

            // Create a div element
            const div = document.createElement('div');
            if (delta < 0 && marginleft <= 0) {
                // Prevent decreasing indentation below zero
                marginleft = 0;
            } else {
                div.style.marginLeft = `${delta}px`;
                marginleft += delta;
            }

            // Wrap selected text with the div
            range.surroundContents(div);

            saveState();
        }

        function addVideo() {
            const videoUrl = prompt('Enter the video URL:');
            if (videoUrl) {
                let embedUrl;
                if (isYouTubeUrl(videoUrl)) {
                    // If the URL is from YouTube, construct the embeddable URL
                    const videoId = extractYouTubeVideoId(videoUrl);
                    embedUrl = `https://www.youtube.com/embed/${videoId}`;
                } else {
                    embedUrl = videoUrl;
                }

                const iframe = document.createElement('iframe');
                iframe.setAttribute('src', embedUrl);
                iframe.setAttribute('width', '560');
                iframe.setAttribute('height', '315');
                iframe.setAttribute('frameborder', '0');
                iframe.setAttribute('allowfullscreen', 'true');

                insertAtCaret(iframe);
                saveState();
            }
        }

        function addImage() {
            const imageUrl = prompt('Enter the image URL:');
            if (imageUrl) {
                const img = document.createElement('img');
                img.setAttribute('src', imageUrl);
                img.setAttribute('alt', 'Image');

                insertAtCaret(img);
                saveState();
            }
        }

        function insertTable() {
            const table = document.createElement('table');
            const rows = prompt('Enter the number of rows:');
            const cols = prompt('Enter the number of columns:');

            for (let i = 0; i < rows; i++) {
                const row = table.insertRow();
                for (let j = 0; j < cols; j++) {
                    const cell = row.insertCell();
                    cell.textContent = 'Cell';
                }
            }

            insertAtCaret(table);
            saveState();
        }
     function applyHeading(headingType) {
    const selection = window.getSelection();
    const range = selection.getRangeAt(0);

    const selectedText = range.toString();

    if (selectedText) {
        const heading = document.createElement(headingType);
        heading.textContent = selectedText;
        range.deleteContents();
        range.insertNode(heading);
    } else {
        // No text selected, apply the heading to the entire range
        const heading = document.createElement(headingType);
        heading.appendChild(range.extractContents());
        range.insertNode(heading);
    }

    saveState();
}

function getClosestHeading(node) {
    // Traverse up the DOM hierarchy to find the closest heading element
    while (node && node.nodeType !== 1) {
        node = node.parentNode;
    }
    return node;
}
        
        function deleteTable() {
            const table = findParentTable();
            if (table) {
                table.remove();
                saveState();
            }
        }

        function insertRow() {
            const table = findParentTable();
            if (table) {
                const selectedRow = getSelectedRow();
                const newRow = table.insertRow(selectedRow ? selectedRow.rowIndex + 1 : 0);
                const cols = table.rows[0].cells.length;

                for (let j = 0; j < cols; j++) {
                    const cell = newRow.insertCell();
                    cell.textContent = 'Cell';
                }

                saveState();
            }
        }

        function deleteRow() {
            const table = findParentTable();
            if (table) {
                const selectedRow = getSelectedRow();
                if (selectedRow) {
                    table.deleteRow(selectedRow.rowIndex);
                    saveState();
                }
            }
        }

        function insertColumn() {
            const table = findParentTable();
            if (table) {
                const selectedCell = getSelectedCell();
                const colIndex = selectedCell ? selectedCell.cellIndex + 1 : 0;

                for (let i = 0; i < table.rows.length; i++) {
                    const cell = table.rows[i].insertCell(colIndex);
                    cell.textContent = 'Cell';
                }

                saveState();
            }
        }

        function deleteColumn() {
            const table = findParentTable();
            if (table) {
                const selectedCell = getSelectedCell();
                if (selectedCell) {
                    const colIndex = selectedCell.cellIndex;
                    for (let i = 0; i < table.rows.length; i++) {
                        table.rows[i].deleteCell(colIndex);
                    }
                    saveState();
                }
            }
        }
        function applyBlockQuote() {
            const selection = window.getSelection();
            if (!selection.isCollapsed) {
                const range = selection.getRangeAt(0);
                const blockquote = document.createElement('blockquote');
                blockquote.appendChild(range.extractContents());
                range.insertNode(blockquote);
                blockquote.style.borderLeft = 'thick solid grey';
                blockquote.style.background = 'lightgrey';
                blockquote.style.padding = '5px';
                saveState();
            }
        }
         let isSourceCodeView = false;

        function toggleSourceCodeView() {
            const editor = document.getElementById('editor');
            const sourceCode = document.getElementById('sourceCode');
    
            if (isSourceCodeView) {
                // Switch to normal view
                editor.style.display = 'block';
                sourceCode.style.display = 'none';
                editor.innerHTML = sourceCode.textContent;
            } else {
                // Switch to source code view
                editor.style.display = 'none';
                sourceCode.style.display = 'block';
                sourceCode.textContent = editor.innerHTML;
            }
    
            isSourceCodeView = !isSourceCodeView;
        }
        
        let isMaximized = false;

        function toggleMaximize() {  
            const editor = document.getElementById('editor');
            if (isMaximized) {
                // Restore the original size
                editor.style.height = '200px'; // Set the desired height
            } else {
                // Maximize the textarea
                editor.style.height = '1000px';
                 
            }
           
            isMaximized = !isMaximized;
        }

        function addLink() {
            const selection = window.getSelection();
            const linkText = selection.isCollapsed ? '' : selection.toString();
    
            // Set the default value of the link text input field
            document.getElementById('linkText').value = linkText;
    
            // Open the Bootstrap modal for adding a link
            $('#linkModal').modal('show');
        }

        function insertLink() {
            const linkType = document.getElementById('linkType').value;
            const linkUrl = document.getElementById('linkUrl').value;
            const target = document.getElementById('target').value;
    
            const linkText = document.getElementById('linkText').value;
    
            // Create the link or iframe based on the selected target
            const element = createLinkElement(linkText, linkType, linkUrl, target);
    
            const selection = window.getSelection();
            if (!selection.isCollapsed) {
                // Text is selected, replace the selected text with the link
                const range = selection.getRangeAt(0);
                range.deleteContents();
                range.insertNode(element);
            } else {
                // No text selected, insert the link at the cursor position
                insertAtCaret(element);
            }
    
            saveState();
    
            // Close the Bootstrap modal
            $('#linkModal').modal('hide');
        }
        
        function unlink() {
            const selection = window.getSelection();
            const range = selection.getRangeAt(0);
            const parentElement = range.commonAncestorContainer.parentElement;
    
            // Check if the selection is within an anchor tag
            if (parentElement.tagName === 'A') {
                const textNode = document.createTextNode(parentElement.textContent);
                parentElement.parentNode.replaceChild(textNode, parentElement);
                saveState();
            }
        }
    
        function createLinkElement(linkText, linkType, linkUrl, target) {
            let element;
            if (linkType === 'email') {
                element = document.createElement('a');
                element.textContent = linkText;
                element.setAttribute('href', `mailto:${linkUrl}`);
                element.setAttribute('target', target);
            } else if (linkType === 'call') {
                element = document.createElement('a');
                element.textContent = linkText;
                element.setAttribute('href', `tel:${linkUrl}`);
                element.setAttribute('target', target);
            } else if (target === 'iframe') {
                element = document.createElement('iframe');
                element.setAttribute('src', linkUrl);
                element.setAttribute('width', '560');
                element.setAttribute('height', '315');
                element.setAttribute('frameborder', '0');
            } else {
                element = document.createElement('a');
                element.textContent = linkText;
                element.setAttribute('href', linkUrl);
                element.setAttribute('target', target);
            }
            return element;
        }
        
        function findParentTable() {
            const selection = window.getSelection();
            const node = selection.focusNode;
            return node.closest('table');
        }

        function getSelectedRow() {
            const selection = window.getSelection();
            const node = selection.focusNode;
            return node.closest('tr');
        }

        function getSelectedCell() {
            const selection = window.getSelection();
            const node = selection.focusNode;
            return node.closest('td');
        }

        function isYouTubeUrl(url) {
            return url.includes('youtube.com') || url.includes('youtu.be');
        }

        function extractYouTubeVideoId(url) {
            const youtubeRegEx = /(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
            const match = url.match(youtubeRegEx);
            return match ? match[1] : null;
        }

        let marginleft = 0;

        function insertAtCaret(element) {
            const selection = window.getSelection();
            const range = selection.getRangeAt(0);
            range.deleteContents();
            range.insertNode(element);
        }

        function saveState() {
            const currentState = editor.innerHTML;
            undoStack.push(currentState);
            // Clear redo stack after a new action
            redoStack.length = 0;
        }

        function undo() {
            if (undoStack.length > 1) {
                redoStack.push(undoStack.pop());
                editor.innerHTML = undoStack[undoStack.length - 1];
            }
        }

        function redo() {
            if (redoStack.length > 0) {
                undoStack.push(redoStack.pop());
                editor.innerHTML = undoStack[undoStack.length - 1];
            }
        }
    </script>
</body>
</html>
