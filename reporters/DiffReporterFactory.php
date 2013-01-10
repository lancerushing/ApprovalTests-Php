<?php

class DiffReporterFactory {

	public static function DiffReporter() {
		if (is_file("/usr/bin/meld")) {
			return new MeldDiffReporter();
		}
		//return new OpenDiffReporter();

        if (is_file("/usr/bin/chdiff")) {
            return new ChangesDiffReporter();
        }

        return new NoReporter();

	}

}