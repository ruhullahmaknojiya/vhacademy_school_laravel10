<div id="documents">
    <div class="form-group">
        <label for="documents[0][title]">Title</label>
        <input type="text" class="form-control" id="documents[0][title]" name="documents[0][title]">
    </div>
    <div class="form-group">
        <label for="documents[0][file]">Document</label>
        <input type="file" class="form-control" id="documents[0][file]" name="documents[0][file]">
    </div>
</div>
<button type="button" class="btn btn-secondary" onclick="addDocument()">Add Another Document</button>

<script>
function addDocument() {
    var documentIndex = document.querySelectorAll('#documents .form-group').length / 2;
    var documentForm = `
        <div class="form-group">
            <label for="documents[${documentIndex}][title]">Title</label>
            <input type="text" class="form-control" id="documents[${documentIndex}][title]" name="documents[${documentIndex}][title]">
        </div>
        <div class="form-group">
            <label for="documents[${documentIndex}][document_path]">Document</label>
            <input type="document_path" class="form-control" id="documents[${documentIndex}][document_path]" name="documents[${documentIndex}][file]">
        </div>
    `;
    document.getElementById('documents').insertAdjacentHTML('beforeend', documentForm);
}
</script>
