<?php

if ( ! function_exists('Markdown'))
{
	include Bundle::path('scribe').'classes/markdown.php';
}

class Scribe
{
	public static function content($name)
	{
		$content = Scribe_Content::where_name($name)
			->where_hidden(false)
			->first();
		if (! $content) return null;
		return Markdown($content->content);
	}

	public static function content_id($id)
	{
		$content = Scribe_Content::where_id($id)
			->where_hidden(false)
			->first();
		if (! $content) return null;
		return Markdown($content->content);
	}
	/**
     * This Method will get all the name like from the DB and return an paginated Object ! 
     * @param type $name
     * @return type
     */
    public static function all($name, $paginate = 10) {
        $contents = Scribe_Content::where('name', 'LIKE', $name . '%')
                ->where_hidden(false)
                ->order_by('id', 'DESC')
                ->paginate($paginate);
        return $contents;
    }
}
