<?php
class Category_model extends MY_Model {
    protected $table_name = "category";    

    public function recursiveOutput($parent_id){
                
        $result = $this->get_where(['parent_id'=>$parent_id,'is_deleted'=>0]);
        if(!empty($result)) {
            foreach($result as $k=>$v) {
                $result[$k]['children'] = $this->recursiveOutput($v['id']);
            }
        }
        return $result;

    }

    public function recursiveHTML($category, $level=0) {

        $html = "";
        $level++;
        if(!empty($category)) {
            $html .= '<ul>';
            foreach($category as $v) {
                $html .= '<li>'.$v['title'].'</li>';
                if(!empty($v['children'])) {
                    $html .= '<li>'.$this->recursiveHTML($v['children'], $level)."</li>";
                }                
            }
            $html .= '</ul>';
        }
        return $html;

    }

}
?>