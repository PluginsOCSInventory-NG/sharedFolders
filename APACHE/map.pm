
 
package Apache::Ocsinventory::Plugins::Sharedfolder::Map;
 
use strict;
 
use Apache::Ocsinventory::Map;

$DATA_MAP{sharedfolders} = {
		mask => 0,
		multi => 1,
		auto => 1,
		delOnReplace => 1,
		sortBy => 'SHARENAME',
		writeDiff => 0,
		cache => 0,
		fields => {
                SHARENAME => {},
                SHAREPATH => {},
                SHARETYPE => {},
                SHAREDESC => {}
	}
};
1;