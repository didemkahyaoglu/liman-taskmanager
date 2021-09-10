<div id="task_list">

</div>

@component("modal-component", [
    "id" => "fileLocationModal",
    "title" => "Dosya Konumu",
    "notSized" => "true"
])
<div id="fileLocationContent"></div>
@endcomponent

@component("modal-component", [
    "id" => "serviceModal",
    "title" => "Servis Bilgisi",
    "notSized" => "true"
])
<pre id="serviceContent"></pre>
@endcomponent

@component("modal-component", [
    "id" => "psTreeModal",
    "title" => "İşlem Ağacı",
    "notSized" => "true"
])
<pre id="psTreeContent"></pre>
@endcomponent

@component("modal-component", [
    "id" => "psCommandModal",
    "title" => "Çalıştırma Argümanları",
    "notSized" => "true"
])
<pre id="psCommandContent"></pre>
@endcomponent

@include("taskmanager.scripts")