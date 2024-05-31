<?php

/**
 * ! Proposal configuration Nov 30 - 2023 / @Andres @Nerea
 * ! To maintain consistency, we plan to refactor all PHP files and establish a structured approach for adding files in the future.
 */

/**
 * 
 * *  Reference Folder: This directory will serve as a reference, housing API endpoints, Ajax functions, and functionalities slated for removal once the project transitions to production. Additionally, these files will not be uploaded to the server.
 * 
 */

/*
 * If working in local env or virtual
 */
require get_template_directory() . '/functions/project/local/local-variable.php'; // checked

// ! Default folder is ment to keep it the way it is, if you need to alter any file is it mandatory to move it to project folder.
/**
 *  ///////////////////////////////////////////////////////////////////////////////
 *  ///////////////////////////////////////////////////////////////////////////////
 *  ///////////////////////////////    DEFAULT    /////////////////////////////////
 *  ///////////////////////////////////////////////////////////////////////////////
 *  ///////////////////////////////////////////////////////////////////////////////
 */
require get_template_directory() . '/functions/default/index.php'; // checked


// ! Checks really important variables and functions to continue working on the project
require get_template_directory() . '/functions/default/errors/errors.php';


// Custom Blocks Global
require get_template_directory() . '/functions/default/blocks/global/block-callout.php';
require get_template_directory() . '/functions/default/blocks/global/block-footnote.php';
require get_template_directory() . '/functions/default/blocks/global/block-highlighted.php';

// ! Project is ment for files that depend on this project, like ACF,SiteSettings, APIs,Ajax Request
/*
 *  ///////////////////////////////////////////////////////////////////////////////
 *  ///////////////////////////////////////////////////////////////////////////////
 *  ///////////////////////////////    PROJECT    /////////////////////////////////
 *  ///////////////////////////////////////////////////////////////////////////////
 *  ///////////////////////////////////////////////////////////////////////////////
*/

// sidebar
require get_template_directory() . '/functions/project/extend-sidebar/post-types.php';
require get_template_directory() . '/functions/project/extend-sidebar/taxonomies.php';

// INDEX PROJECT
require get_template_directory() . '/functions/project/index.php';

// enqueues
require get_template_directory() . '/functions/project/enqueues/define-hash.php';
require get_template_directory() . '/functions/project/enqueues/frontend.php';
require get_template_directory() . '/functions/project/enqueues/backend.php';

// custom ACF Fields
require get_template_directory() . '/functions/project/acf/acf-message/init.php';
require get_template_directory() . '/functions/project/acf/acf-spacing/init.php';