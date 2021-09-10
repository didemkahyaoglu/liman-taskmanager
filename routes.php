<?php

return [
    "index" => "HomeController@index",

    // Tasks
    "runTask" => "TaskController@runTask",
    "checkTask" => "TaskController@checkTask",

    // Hostname Settings
    "get_hostname" => "HostnameController@get",
    "set_hostname" => "HostnameController@set",

    // Systeminfo
    "get_system_info" => "SystemInfoController@get",
    "install_lshw" => "SystemInfoController@install",

    // Runscript
    "run_script" => "RunScriptController@run",

    // TaskView
    "example_task" => "TaskViewController@run",

    // Task Manager Routes
    "task_manager_list" => "TaskManagerController@getList",
    "get_file_location" => "TaskManagerController@getFileLocation",
    "get_service" => "TaskManagerController@getService",
    "kill_pid" => "TaskManagerController@killPid",
    "pstree" => "TaskManagerController@psTree",
    "get_ps_command"=> "TaskManagerController@getPsCommand",
    "kill_all"=> "TaskManagerController@killAll",

    // File Manager Routes
    "route_getFiles" => "FileController@getFilesList"

    
];
