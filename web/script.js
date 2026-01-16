let dragged = null;

function addBlock(type) {
    const blocks = document.getElementById('blocks');
    const div = document.createElement('div');

    div.className = 'block border rounded p-2 mb-2 ' + type;
    div.dataset.type = type;
    div.draggable = true;

    div.addEventListener("dragstart", dragStart);
    div.addEventListener("dragover", dragOver);
    div.addEventListener("drop", drop);
    div.addEventListener("dragend", dragEnd);

    let field = '';

    if (type === 'mouvement') {
        field = `
            <label>Angle servo (°)</label>
            <input type="number" class="form-control" min="0" max="180">
        `;
    }

    if (type === 'son') {
        field = `
            <label>Son</label>
            <input type="text" class="form-control" placeholder="bip, melody1">
        `;
    }

    if (type === 'message') {
        field = `
            <label>Message à afficher</label>
            <input type="text" class="form-control" maxlength="32">
        `;
    }

    if (type === 'pause') {
        field = `
            <label>Message à afficher</label>
            <input type="text" class="form-control" maxlength="32"> 
        `;
    }

    div.innerHTML = `
        <div class="d-flex justify-content-between align-items-center mb-2">
            <strong>${type.toUpperCase()}</strong>
            <button type="button" class="btn btn-lg" onclick="removeBlock(this)"><i class="bi bi-x-lg"></i></button>
        </div>
        ${field}
    `;

    blocks.appendChild(div);
}

function removeBlock(btn) {
    btn.closest('.block').remove();
}

function dragStart(e) {
    dragged = this;
    this.classList.add("opacity-50");
}

function dragOver(e) {
    e.preventDefault();
}

function drop(e) {
    e.preventDefault();
    if (this === dragged) return;

    const blocks = [...this.parentNode.children];
    const draggedIndex = blocks.indexOf(dragged);
    const targetIndex = blocks.indexOf(this);

    if (draggedIndex < targetIndex) {
        this.after(dragged);
    } else {
        this.before(dragged);
    }
}

function dragEnd() {
    this.classList.remove("opacity-50");
    dragged = null;
}

document.getElementById('choreoForm').addEventListener('submit', function () {
    const blocks = document.querySelectorAll('.block');
    let sequence = [];

    blocks.forEach((block, index) => {
        sequence.push({
            order: index,
            type: block.dataset.type,
            value: block.querySelector('input').value
        });
    });

    document.getElementById('sequence').value = JSON.stringify(sequence);
});