import { ButtonActionElement } from "./buttonactelement.js";

const RowElement = (iteration, columns, buttons = []) => {
    console.log(columns);
    const columnsHtml = columns.map(column => `<td class="border-b  py-2.5 p-1 border-gray-200 text-center">${column}</td>`).join('');
    const buttonsHtml = buttons.length > 0 ? `<td class="border-b border-gray-200 text-center">${ButtonActionElement(...buttons)}</td>` : '';
    return `
    <tr>
        <td class="border-b border-gray-200 text-center">${iteration}</td>
        ${columnsHtml}
        ${buttonsHtml}
    </tr>
    `;
};


export {
    RowElement
}
