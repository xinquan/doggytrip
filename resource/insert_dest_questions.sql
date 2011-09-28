delete from DestinationQuestion;

insert into DestinationQuestion
set dest_id = 'maldives',
question_input_name = 'like_dive_or_watervilla',
question_title = '你更喜欢浮潜还是住水上屋',
question_type = 'single_option',
question_option_json = '[{"option_value":"dive","option_title":"我更喜欢浮潜"},{"option_value":"watervilla","option_title":"我更喜欢水上屋"}]',
question_description = '在马尔代夫，一般浮潜比较好的岛珊瑚礁保护的都很好，而建水上屋（watervilla）会破坏珊瑚礁，所以一般有水上屋的岛屿浮潜效果都不是太好';

insert into DestinationQuestion
set dest_id = 'maldives',
question_input_name = 'fav_island',
question_title = '你已经选好岛了吗？',
question_type = 'text',
question_option_json = '{"input_size":"24","input_place_holder":"Angsana ihuru"}',
question_description = '如果你已经选好岛了，在这里填写岛的名字。如Angsana ihuru，否则请留空。';
