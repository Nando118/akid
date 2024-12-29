<dialog id="modal_sign_in" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="text-lg font-bold">Hello!</h3>
        <p class="py-4">Press ESC key or click the button below to close</p>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
                <button class="btn" onclick="modal_sign_up.showModal()">open modal</button>
            </form>
        </div>
    </div>
</dialog>
