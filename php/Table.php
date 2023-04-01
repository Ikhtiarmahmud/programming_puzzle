<?php

use ArrayObject;

class Table extends ArrayObject
{
    public $tableData;

    /**
     * Constructor
     */
    public function __construct($tableData)
    {
        $this->setTableData($tableData);
    }

    /**
     * Get the table data
     */
    public function getTableData()
    {
        return $this->tableData;
    }

    /**
     * Set the table data
     */
    public function setTableData($tableData)
    {
        $this->tableData = $tableData;
    }

    /**
     * Display the table data as a table
     */
    public function displayAsTable()
    {
        $tableData = $this->getTableData();
        if (empty($tableData)) {
            return;
        }

        $headers = array_shift($tableData);
        echo '<table class="table table-primary"><thead><tr>';
        foreach ($headers as $header) {
            echo "<th>$header</th>";
        }
        echo '</tr></thead><tbody>';

        foreach ($tableData as $rowData) {
            echo '<tr>';
            foreach ($rowData as $cellData) {
                echo "<td>$cellData</td>";
            }
            echo '</tr>';
        }

        echo '</tbody></table>';
    }
}

