var $collectionHolder;

// setup an "add a speaker" link
var $addSpeakerLink = $('<a href="#" class="add_speaker_link">Add a speaker</a>');
var $newLinkLi = $('<li></li>').append($addSpeakerLink);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of speakers
    $collectionHolder = $('ul.speakers');

    // add the "add a speaker" anchor and li to the speakers ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addSpeakerLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new speaker form (see next code block)
        addSpeakerForm($collectionHolder, $newLinkLi);
    });
});



function addSpeakerForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a speaker" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}