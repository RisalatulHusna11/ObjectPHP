<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f9f3ff;
    }

    .editor-wrapper {
        max-width: 1200px;
        /* margin: 2rem auto; */
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .editor-title {
        font-size: 1.6rem;
        font-weight: bold;
        color: #9d4edd;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .editor-box {
        display: flex;
        flex-direction: column;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 10px rgba(157, 78, 221, 0.08);
    }

    @media (min-width: 768px) {
        .editor-box {
            flex-direction: row;
        }
    }

    .editor-left,
    .editor-right {
        flex: 1;
        padding: 2rem;
    }

    .editor-header {
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: #a855f7;
    }

.CodeMirror {
    max-height: 200px; /* batasi tinggi maksimal editor */
    overflow-y: auto;  /* aktifkan scroll vertikal jika konten lebih tinggi */
    border: 1px solid #e5d0ff;
    border-radius: 8px;
    font-size: 0.95rem;
    scrollbar-width: thin;
    scrollbar-color: #d3bdf0 #f3e8ff;
}

    .output-area {
        background: #fceff9;
        border: 1px dashed #f3c4fb;
        border-radius: 8px;
        padding: 1rem;
        min-height: 40px;
        white-space: pre-wrap;
        font-family: monospace;
        font-size: 0.9rem;
        color: #3b0764;
    }

    .btn-group {
        display: flex;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .run-btn,
    .clear-btn {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.2s;
        font-weight: 500;
    }

    .run-btn {
        background-color: #9d4edd;
        color: white;
    }

    .run-btn:hover {
        background-color: #c77dff;
    }

    .clear-btn {
        background-color: #f3e8ff;
        color: #6b21a8;
    }

    .clear-btn:hover {
        background-color: #e9d5ff;
    }
</style>





<div class="editor-wrapper">
    <div class="editor-box">
        <div class="editor-left">
            <div class="editor-header">Kode PHP</div>
            <textarea id="code">&lt;?php
// Tulis kode PHP kamu di sini...</textarea>

            <div class="btn-group">
                <button class="run-btn" onclick="runCode()">▶️ RUN</button>
                <button class="clear-btn" onclick="editor.setValue('');">RESET</button>
            </div>
        </div>

        <div class="editor-right">
            <div class="editor-header">Output</div>
            <div id="output" class="output-area">Output akan tampil di sini...</div>
        </div>
    </div>
</div>

{{-- CodeMirror --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/codemirror.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/mode/css/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/mode/clike/clike.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/mode/htmlmixed/htmlmixed.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.10/mode/php/php.min.js"></script>

<script>
    const editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        lineNumbers: true,
        mode: "application/x-httpd-php",
        theme: "default",
        tabSize: 4,
        indentWithTabs: true
    });

    function runCode() {
        const code = editor.getValue();
        fetch('/run', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ code })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("output").textContent = data.output;
        })
        .catch(error => {
            document.getElementById("output").textContent = "Terjadi kesalahan saat menjalankan kode.";
        });
    }
</script>