<?php

class DataProcess
{
    protected $dataArray = [];
    public function __construct(array $dataArray)
    {
        $this->dataArray = $dataArray;
    }

    public function addColumn($columnName, $columnFunction)
    {
        $totalDataArray = $this->dataArray;
        foreach ($totalDataArray as $key => $value) {
            $totalDataArray[$key][$columnName] = is_callable($columnFunction) ? call_user_func($columnFunction, $value) : $columnFunction;
        }
        $this->dataArray = $totalDataArray;

        return $this;
    }

    public function editColumn($columnName, $columnFunction)
    {
        $totalDataArray = $this->dataArray;
        foreach ($totalDataArray as $key => $value) {
            $totalDataArray[$key][$columnName] = is_callable($columnFunction) ? call_user_func($columnFunction, $value) : $columnFunction;
        }
        $this->dataArray = $totalDataArray;
        return $this;
    }

    public function deleteColumn($columnName)
    {
        $totalDataArray = $this->dataArray;
        foreach ($totalDataArray as $key => $value) {
            unset($totalDataArray[$key][$columnName]);
        }
        $this->dataArray = $totalDataArray;
        return $this;
    }
    public function toXml()
    {
        $array=$this->dataArray;
        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($array, array ($xml, 'addChild'));
        echo  $xml->asXML();
    }
    public function toJson()
    {
        echo json_encode($this->dataArray);
    }
    public function toTable()
    {
        $html='<table border="1">';
        $html.= '<tr>';
        foreach ($this->dataArray as $value) {
            foreach ($value as $key => $data) {
                $html .= '<th>' . $key . '</th>';
            }
            break;
        }
        $html .= '</tr>';
        foreach ($this->dataArray as $value) {
            $html .= '<tr>';
            foreach ($value as $data) {
                $html .= '<td>' . $data . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';
        echo $html;
    }
}

?>
