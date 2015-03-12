<?php
/**
 * CCMenu class file.
 *
 */

Yii::import('zii.widgets.CMenu');

class CCMenu extends CMenu
{

	public $activeCssClass='active';

	/**
	 * @var array HTML attributes for the submenu's container tag.
	 */
	public $submenuHtmlOptions = array();
	
/**
	 * Recursively renders the menu items.
	 * @param array $items the menu items to be rendered recursively
	 */
	protected function renderMenuRecursive($items)
	{
		$count=0;
		$n=count($items);
		foreach($items as $item)
		{
			$count++;
			$options=isset($item['itemOptions']) ? $item['itemOptions'] : array();
			$class=array();
			if($item['active'] && $this->activeCssClass!='')
				$class[]=$this->activeCssClass;
			if($count===1 && $this->firstItemCssClass!==null)
				$class[]=$this->firstItemCssClass;
			if($count===$n && $this->lastItemCssClass!==null)
				$class[]=$this->lastItemCssClass;
			if($this->itemCssClass!==null)
				$class[]=$this->itemCssClass;
			if($class!==array())
			{
				if(empty($options['class']))
					$options['class']=implode(' ',$class);
				else
					$options['class'].=' '.implode(' ',$class);
			}
			
		    if($item['level'] == 1) {
		        if($item['active']) {
		            $item['label'] = '<span class="title">'.$item['label'].'</span><span class="arrow open"></span><span class="selected"></span>';
		        } else {
		            $item['label'] = '<span class="title">'.$item['label'].'</span><span class="arrow"></span>';
		        }
			}
		    if(isset($item['favicon'])) {
			    $item['label'] = '<i class="fa '.$item['favicon'].'"></i>'.$item['label'];
			}

			echo CHtml::openTag('li', $options);

			$menu=$this->renderMenuItem($item);
			if(isset($this->itemTemplate) || isset($item['template']))
			{
				$template=isset($item['template']) ? $item['template'] : $this->itemTemplate;
				echo strtr($template,array('{menu}'=>$menu));
			}
			else
				echo $menu;

			if(isset($item['items']) && count($item['items']))
			{
				echo "\n".CHtml::openTag('ul',isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions)."\n";
				$this->renderMenuRecursive($item['items']);
				echo CHtml::closeTag('ul')."\n";
			}

			echo CHtml::closeTag('li')."\n";
		}
	}

	/**
	 * Normalizes the {@link items} property so that the 'active' state is properly identified for every menu item.
	 * @param array $items the items to be normalized.
	 * @param string $route the route of the current request.
	 * @param boolean $active whether there is an active child menu item.
	 * @return array the normalized menu items
	 */
	protected function normalizeItems($items,$route,&$active)
	{
		foreach($items as $i=>$item)
		{
			if(isset($item['visible']) && !$item['visible'])
			{
				unset($items[$i]);
				continue;
			}
			if(!isset($item['label']))
				$item['label']='';
			if($this->encodeLabel)
				$items[$i]['label']=CHtml::encode($item['label']);
			$hasActiveChild=false;
			if(isset($item['items']))
			{
				$items[$i]['items']=$this->normalizeItems($item['items'],$route,$hasActiveChild);
				if(empty($items[$i]['items']) && $this->hideEmptyItems)
				{
					unset($items[$i]['items']);
					if(!isset($item['url']))
					{
						unset($items[$i]);
						continue;
					}
				} 
			}
			if(!isset($item['active']))
			{
				if($hasActiveChild || $this->activateItems && $this->isItemActive($item,$route))
					$active=$items[$i]['active']=true;
				else
					$items[$i]['active']=false;
			}
			elseif($item['active'])
				$active=true;
				/*
		    if($item['level'] == 1) {
		        if($active) {
		            $item['label'] = '<i class="fa"></i><span class="title">'.$item['label'].'</span><span class="arrow open"></span><span class="selected"></span>';
		        } else {
		            print_r($item['level']);
		            $item['label'] = '<i class="fa"></i><span class="title">'.$item['label'].'</span><span class="arrow"></span>';
		        }
			    
			}*/
		}
		return array_values($items);
	}
	
}