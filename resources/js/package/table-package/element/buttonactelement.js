
const ButtonActionElement = (
    iteration,
    item,
    external_link = null,
    external_name = null,
    onlyexternallink = false
) => {
    return `
    <div class="relative inline-block text-left">
            <div>
                <button type="button"
                    class="inline-flex w-full cursor-pointer justify-center gap-x-1.5 rounded-md  px-3 py-2 text-sm "
                    id="menu-button-${iteration}" aria-expanded="true" aria-haspopup="true">
                    <i class="fa-light fa-pen-to-square"></i>
                </button>
            </div>

            <div class="scale-0 absolute right-0 z-10  origin-top-right rounded-md bg-white  shadow-lg border "
                role="menu" aria-orientation="vertical" id="dropdown-${iteration}"
                aria-labelledby="menu-button-${iteration}" tabindex="-1">
                <div class="py-1" role="none">
                    ${
                        external_link != null
                            ? `<a href="${external_link}"
                        class="block px-4 whitespace-nowrap py-2 hover:text-black text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">${external_name}</a>`
                            : ""
                    }
                    ${
                        onlyexternallink
                            ? ""
                            : `<a href="${
                                  window.location.href.slice(-1) == "/"
                                      ? window.location.href.slice(0, -1)
                                      : window.location.href
                              }/${item.id}/edit"
                        class="block px-4 whitespace-nowrap py-2 hover:text-black text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">Edit</a>
                        <button id="delete-${iteration}" "
                        class="block cursor-pointer px-4 whitespace-nowrap py-2 hover:text-black text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">Delete</button>`
                    }
                </div>
            </div>
        </div>

        <div id="modal-delete-${iteration}" class="relative invisible opacity-0 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

  <div class="fixed inset-0 bg-black opacity-65 transition-opacity" aria-hidden="true"></div>

  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-base font-semibold text-gray-900" id="modal-title">Delete Head Office Data?</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to Delete Your Head Office Data? All of your data who connected to Head Office will be permanently removed. This action cannot be undone.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-100 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <button name="${
              item.id
          }" id="final-choices-delete-${iteration}" type="button" class="inline-flex w-full justify-center rounded-md cursor-pointer bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Delete</button>
          <button type="button" id="modal-button-hidden-${iteration}" class="mt-3 inline-flex w-full justify-center rounded-md cursor-pointer bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
    `;
};

export {
    ButtonActionElement
}
